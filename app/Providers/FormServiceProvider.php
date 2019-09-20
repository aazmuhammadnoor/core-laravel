<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;

class FormServiceProvider extends ServiceProvider
{   

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('newText', 'backend.form.new_text', ['width','label','name','value','attributes']);
        \Form::component('newEmail', 'backend.form.new_email', ['width','label','name','value','attributes']);
        \Form::component('newTextarea', 'backend.form.new_textarea', ['width','label','name','value','attributes']);
        \Form::component('newOption', 'backend.form.new_option', ['width','label','name','value','attributes','array']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
