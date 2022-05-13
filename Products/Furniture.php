<?php

class Furniture extends Product implements Validator
{
    protected $inputs;

    function __construct(array $inputs)
    {
        parent::__construct();
        $this->inputs = $inputs;
        // $this->type = $inputs['type'];
        
    }

    public function validateAttributes()
    {
        if(is_numeric($this->inputs['height']) && is_numeric($this->inputs['width']) && is_numeric($this->inputs['length']) && floatval($this->inputs['height'] >= 0) && floatval($this->inputs['width'] >= 0) && floatval($this->inputs['length'] >= 0))
        {
            $this->attribute = $this->inputs['height'].'x'.$this->inputs['width'].'x'.$this->inputs['length'];
            return true;
        }

        return false;
    }

};