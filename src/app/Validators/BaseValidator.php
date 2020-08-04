<?php

namespace App\Validators;


use Illuminate\Support\Facades\Validator;

abstract class BaseValidator implements ValidatorInterface
{
    protected $validator;
    protected $data;

    public function __construct($data){
        $this->data = $data;
        $this->validator = Validator::make(
            $this->data,
            $this->rules(),
            $this->messages()
        );

    }

    public function validate()
    {
        return $this->validator->validate();
    }

    public function messages(){
        return [];
    }
}
