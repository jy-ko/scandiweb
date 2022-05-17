<?php

class Validator
{
    private $inputs;
    private $errors = [];
    private static $fields = ['sku', 'name', 'price', 'type'];

    public function __construct($inputs)
    {
        $this->inputs = $inputs;

        switch ($this->inputs['type']) {
            case "dvd":
                $this->validate(new  Dvd($this->inputs));
                break;
            case "book":
                $this->validate(new  Book($this->inputs));
                break;
            case "furniture":
                $this->validate(new  Furniture($this->inputs));
                break;
        }

    }

    public function validateForm() {
        foreach(self::$fields as $field) {
            if(array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        // $this->validateType();
        // $this->validateAttributes();

    }

    private function validateSku(){
        $val = trim($this->data['sku']);

        if(empty($val)) {
            $this->addError('sku', 'sku cannot be empty');
        } else {
            if(!preg_match('', $val)){
            $this->addError('sku', 'sku must be a string');
            }
        }
    }
    private function validateName(){
        $val = trim($this->data['name']);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else {
            if(!preg_match('', $val)){
            $this->addError('name', 'name must be a string');
            }
        }
    }
    private function validatePrice(){
        $val = trim($this->data['price']);

        if(empty($val)) {
            $this->addError('price', 'price cannot be empty');
        } else {
            if(!preg_match('', $val)){
            $this->addError('price', 'price must be a string');
            }
        }
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
};