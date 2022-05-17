<?php

class Book extends Product implements Validator
{
    protected $inputs;

    function __construct(array $inputs)
    {
        parent::__construct();
        $this->inputs = $inputs;
        
    }

    public function validateAttributes()
    {
        if(is_numeric($this->inputs['weight']) && floatval($this->inputs['weight'] >= 0))
        {
            $this->attribute = $this->inputs['weight'].' KG';
            return true;
        }

        return false;
    }
};