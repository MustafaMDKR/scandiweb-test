<?php
namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUM = 'num';
    public const RULE_UNIQUE = 'unique';
    

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attr => $rules) {
            $value = $this->{$attr};

            foreach ($rules as $rule) {
                $ruleName = $rule;

                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if ($attr === 'type') {
                    switch ($value) {
                        case 'DVD':
                            $this->addError('size', self::RULE_REQUIRED);
                            $this->addError('size', self::RULE_NUM);
                            break;
                        
                        case 'Book':
                            $this->addError('weight', self::RULE_REQUIRED);
                            $this->addError('weight', self::RULE_NUM);
                            break;
                        
                        case 'Furniture':
                            $this->addError('width', self::RULE_REQUIRED);
                            $this->addError('width', self::RULE_NUM);
                            $this->addError('height', self::RULE_REQUIRED);
                            $this->addError('height', self::RULE_NUM);
                            $this->addError('length', self::RULE_REQUIRED);
                            $this->addError('length', self::RULE_NUM);
                            break;
                    }
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attr, self::RULE_REQUIRED);
                }

                if ($ruleName === self::RULE_NUM && (!filter_var($value, FILTER_VALIDATE_INT) || $value <= 0)) {
                    $this->addError($attr, self::RULE_NUM);
                }

            }
        }
        return empty($this->errors);
    }


    public function addError(string $attr, string $rule) 
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attr][] = $message;
    }


    public function hasError($attr)
    {
        return $this->errors[$attr] ?? false;
    }


    public function getFirstError($attr)
    {
        return $this->errors[$attr][0] ?? false;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_UNIQUE => 'This field is already exists',
            self::RULE_NUM => 'Please provide a valid field'
        ];
    }
}