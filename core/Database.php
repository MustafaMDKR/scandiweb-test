<?php
namespace app\core;

use PDO;

class Database
{

  public PDO $pdo;


  /**
   * Main Constructor
   */
  public function __construct(array $config) 
  {
    // import required configuration

    $dsn = $config['dsn'] ?? '';
    $user = $config['user'] ?? '';
    $password = $config['password'] ?? '';

    // Intialize DB connection
    $this->pdo = new PDO($dsn, $user, $password);
    
    // Check if there is error connecting db throw exception
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
  }


  /**
   * Method to apply migrations
   *
   * @return void
   */
  public function applyMigrations()
  {
    $this->createMigrationsTable();
    $applied = $this->getAppliedMigrations();

    $newMigrations = [];

    // look up migration files in migrations directory
    $files = scandir(Application::$ROOT_DIR . '/migrations');
    
    // migration files need to be applied
    $toApply = array_diff($files, $applied);
    
    // find applied migrations and others need to be applied and skip . .. dirs
    foreach ($toApply as $migration) {
      if ($migration === '.' || $migration === '..') {
        continue;
      }
      require_once Application::$ROOT_DIR . '/migrations/' . $migration;
      $className = pathinfo($migration, PATHINFO_FILENAME);
      $instance = new $className();
      echo "Applying migration: $migration".PHP_EOL;
      $instance->up();
      echo "Applied migration: $migration successfully".PHP_EOL;

      $newMigrations[] = $migration;
    }

    if (!empty($newMigrations)) {
      $this->saveMigrations($newMigrations);
    } else {
      echo "All migrations is already applied".PHP_EOL;
    }
  }


  /**
   * A method to create database tables
   *
   * @return void
   */
  public function createMigrationsTable()
  {
    $this->pdo->exec("
      CREATE TABLE IF NOT EXISTS migrations(
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=INNODB;");
  }


  /**
   * A method to get which migrations is applied
   *
   * @return void
   */
  public function getAppliedMigrations()
  {
    $stmt = $this->pdo->prepare("SELECT migration FROM migrations");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }


  public function saveMigrations(array $migrations)
  {
    $str = implode(",", array_map(fn($m) => "('$m')", $migrations));

    $stmt = $this->pdo->prepare("
      INSERT INTO migrations (migration) VALUES $str
    ");

    $stmt->execute();
  }


}