<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Services\BladeDirectivesCode;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive(
            'form_input_classes', 
            fn () => BladeDirectivesCode::getFormInputClasses()
        );

        Blade::directive(
            'form_submit_classes', 
            fn () => BladeDirectivesCode::getFormSubmitClasses()
        );

        Blade::directive(
            'form_action_classes', 
            fn () => BladeDirectivesCode::getFormActionClasses()
        );
    }
}
