<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Web\Commons\BladeExtend;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // BladeExtend::register();
        // Blade::directive('fa', function ($expression) {
        //     return "&lt;?php echo fa({$expression}); ?&lt;";
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::directive('fa', function ($expression) {
        //     return "&lt;?php echo fa({$expression}); ?&lt;";
        // });
    }
}
