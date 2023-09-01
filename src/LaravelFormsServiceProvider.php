<?php

namespace michalkortas\LaravelForms;

use michalkortas\LaravelForms\View\Components\Boolean;
use michalkortas\LaravelForms\View\Components\Checkbox;
use michalkortas\LaravelForms\View\Components\Color;
use michalkortas\LaravelForms\View\Components\Date;
use michalkortas\LaravelForms\View\Components\DateTime;
use michalkortas\LaravelForms\View\Components\Email;
use michalkortas\LaravelForms\View\Components\Hidden;
use michalkortas\LaravelForms\View\Components\Nullean;
use michalkortas\LaravelForms\View\Components\Number;
use michalkortas\LaravelForms\View\Components\Password;
use michalkortas\LaravelForms\View\Components\Phone;
use michalkortas\LaravelForms\View\Components\Radio;
use michalkortas\LaravelForms\View\Components\Select;
use michalkortas\LaravelForms\View\Components\RichSelect;
use michalkortas\LaravelForms\View\Components\SelectMultiple;
use michalkortas\LaravelForms\View\Components\Text;
use michalkortas\LaravelForms\View\Components\Textarea;
use michalkortas\LaravelForms\View\Components\Url;
use michalkortas\LaravelForms\View\Components\File;
use michalkortas\LaravelForms\View\Components\Time;
use michalkortas\LaravelForms\View\Components\Month;
use Illuminate\Support\ServiceProvider;

class LaravelFormsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravelforms');

        $this->loadViewComponentsAs('form', [
            Boolean::class,
            Checkbox::class,
            Color::class,
            Date::class,
            DateTime::class,
            Email::class,
            Hidden::class,
            Nullean::class,
            Number::class,
            Password::class,
            Phone::class,
            Radio::class,
            Select::class,
            RichSelect::class,
            SelectMultiple::class,
            Text::class,
            Textarea::class,
            Url::class,
            File::class,
            Time::class,
            Month::class,
        ]);
    }

    public function register()
    {
        //
    }
}
