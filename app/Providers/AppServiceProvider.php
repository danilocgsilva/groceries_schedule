<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
            fn () => $this->getFormInputClasses()
        );

        Blade::directive(
            'form_submit_classes', 
            fn () => $this->getFormSubmitClasses()
        );

        Blade::directive(
            'form_action_classes', 
            fn () => $this->getFormActionClasses()
        );
    }

    private function getFormInputClasses(): string
    {
        $basicClasses = "bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
        $darkClasses = "dark:bg-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";

        return $basicClasses . " " .  $darkClasses;
    }

    public function getFormSubmitClasses(): string
    {
        $basicClasses = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg sm:w-auto px-5 py-2.5 text-center cursor-pointer";
        $darkThemeClasses = "dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800";
        
        return $basicClasses . " " . $darkThemeClasses;
    }

    public function getFormActionClasses(): string
    {
        $basicClasses = "bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg sm:w-auto px-5 py-2.5 text-center cursor-pointer";
        $darkThemeClasses = "dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800";
        
        return $basicClasses . " " . $darkThemeClasses;
    }
}
