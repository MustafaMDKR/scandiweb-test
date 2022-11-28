<?php
namespace app\models;

use app\core\Model;

class ProductModel extends Model
{
    public string $name = '';
    public string $sku = '';
    public string $description = '';
    public string $price = '';
    public string $type = '';
    public string $size = '';
    public string $weight = '';
    public string $width = '';
    public string $height = '';
    public string $length = '';


    public function createProduct()
    {
        echo "Creating a new product";
    }


    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'sku' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED, self::RULE_NUM],
            'type' => [self::RULE_REQUIRED]
        ];
    }

}