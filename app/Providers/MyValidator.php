<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Validator;

class MyValidator extends Validator
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function validateSubmittedWith($attribute, $value,$parameters)
    {
        return($value == True && $this->getValue($parameters[0] > 0))? true:false;
    }

}
