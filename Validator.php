<?php
class Validator
{
    private $data;
    private $errors = [];

    public function __construct($post_data)
    { $this->data = $post_data;
    }

    public function validateForm(){
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
        }
    }
    private function validateName(){
        $val = trim($this->data->{"name"});
        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
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
        $size = trim($this->data->{'size'});
        $weight = trim($this->data->{'weight'});        
        $height = trim($this->data->{'height'});  
        $width = trim($this->data->{'width'});          
        $length = trim($this->data->{'length'});     
        if(empty($val)) {
            $this->addError('type', 'type cannot be empty');
        }
        switch ($val) {
            case "DVD":
                $this->validateDvd($size);
                break;
            case "Book":
                $this->validateBook($weight);
                break;
            case "Furniture":
                $this->validateFurniture($height, $width, $length);
                break;
            }
    }
    
    private function validateDvd($size)
    { 
        if(empty($size)) {
            $this->addError('size', 'size cannot be empty!');
        }
    }

    private function validateBook($weight)
    {
        if(empty($weight)) {
            $this->addError('weight', 'weight cannot be empty!');
        }
    }

    private function validateFurniture($height, $width, $length)
    {
        if(!empty($height) && !empty($width) && !empty($length))
        {   return true;
        } else {
            $this->addError('height', 'please enter all values in HxWxL format');
        }
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
};