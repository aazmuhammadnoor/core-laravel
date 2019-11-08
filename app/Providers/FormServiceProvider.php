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

        \Form::component('newPassword', 'backend.form.new_password', ['width','label','name','value','attributes']);

        \Form::component('newTextarea', 'backend.form.new_textarea', ['width','label','name','value','attributes']);

        \Form::component('newOption', 'backend.form.new_option', ['width','label','name','value','attributes','array']);

        \Form::component('newFile', 'backend.form.new_file', ['width','label','name','value','download','attributes']);

        \Form::component('newSubmit', 'backend.form.new_submit', ['width','submit','cancel']);

        \Form::component('newCheckbox', 'backend.form.new_checkbox', ['width','label','name','value','boolean','attributes']);

        \Form::component('newRadio', 'backend.form.new_radio', ['width','label','name','value','attributes','array']);

        \Form::component('newDateMask', 'backend.form.new_date_mask', ['width','label','name','value','attributes']);

        \Form::component('newDatePicker', 'backend.form.new_date_picker', ['width','label','name','value','attributes']);

        \Form::component('newDateRangePicker', 'backend.form.new_date_range_picker', ['width','label','name','value','attributes']);

        \Form::component('newDateTimeRangePicker', 'backend.form.new_date_time_range_picker', ['width','label','name','value','attributes']);

        \Form::component('newDateTimeBtn', 'backend.form.new_date_time_btn', ['width','label','name','value','attributes']);

        \Form::component('newAppend', 'backend.form.new_append', ['width','label','name','value','attributes','icon','position']);

        \Form::component('newColor', 'backend.form.new_color', ['width','label','name','value','attributes']);

        \Form::component('newTime', 'backend.form.new_time', ['width','label','name','value','attributes']);

        \Form::component('newDocument', 'backend.form.new_document', ['width','label','name','value']);

        \Form::component('newEditor', 'backend.form.new_editor', ['width','label','name','value']);

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
