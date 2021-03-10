<?php

namespace App\Validators;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Validation\Validator;



interface ValidatorInterface
{

    public function validate();
    public function rules();
    public function messages();
}
