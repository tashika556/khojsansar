<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Validators\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
       
    }

   
    public function boot(): void
    {
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
