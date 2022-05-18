<?php
class Validator
{
    private $data;
    private $errors = [];
    private static $fields = ['sku', 'name', 'price', 'type'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm(){

        // foreach(self::$fields as $field) {
        //     if(array_key_exists($field, $this->data)){
        //         trigger_error("$field is not present in data");
        //         return;
        //     }
        // }
        // var_dump($this->data);
        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateType();
        // $this->validateAttributes();
        return $this->errors;

    }

    private function validateSku(){
        $val = trim($this->data->{"sku"});
        if(empty($val)) {
            $this->addError('sku', 'sku cannot be empty');
        // } else {
        //     if(!preg_match('', $val)){
        //     $this->addError('sku', 'sku must be a string');
        //     }
        }
    }
    private function validateName(){
        $val = trim($this->data->{"name"});
        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        // } else {
        //     if(!is_numeric($val)){
        //     $this->addError('name', 'name must be a string');
        //     }
        }
    }
    private function validatePrice(){
        $val = trim($this->data->{'price'});
        if(empty($val)) {
            $this->addError('price', 'price cannot be empty');
        } else {
            if(!is_numeric($val)){
            $this->addError('price', 'price must be numeric');
            }
        }
    }
    private function validateType(){
        $val = trim($this->data->{'type'});
        if(empty($val)) {
            $this->addError('type', 'type cannot be empty');
        // } else {
        //     if(!preg_match('', $val)){
        //     $this->addError('type', 'type must be a string');
        //     }
        }
    }

    private function validateAttributes(){
        $val = trim($this->data['type']);
        $size = trim($this.data['size']);
        $weight = trim($this.data['weight']);        
        $height = trim($this.data['height']);  
        $width = trim($this.data['width']);          
        $length = trim($this.data['length']);        
          
        switch ($val) {
        case "dvd":
            $this->validateDvd($size);
            break;
        case "book":
            $this->validateBook($weight);
            break;
        case "furniture":
            $this->validateFurniture($height, $width, $length);
        // case "furniture":
        //     $this->validateAttributes(new  Furniture($this->data));
            break;
    }
    }
    public function validateDvd()
    {
        if(is_numeric($this->data['size']) && floatval($this->data['size'] >= 0))
        {
            $this->attribute = $this->data['size'].' MB';
            return true;
        }

        return false;
    }

    public function validateBook()
    {
        if(is_numeric($this->data['weight']) && floatval($this->data['weight'] >= 0))
        {
            $this->attribute = $this->data['weight'].' KG';
            return true;
        }

        return false;
    }

    public function validateFurniture()
    {
        if(is_numeric($this->data['height']) && is_numeric($this->data['width']) && is_numeric($this->data['length']) && floatval($this->data['height'] >= 0) && floatval($this->data['width'] >= 0) && floatval($this->data['length'] >= 0))
        {
            $this->attribute = $this->data['height'].'x'.$this->data['width'].'x'.$this->data['length'];
            return true;
        }

        return false;
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
};