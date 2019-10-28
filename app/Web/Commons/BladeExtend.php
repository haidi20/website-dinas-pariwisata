<?php 
namespace App\Web\Commons;

use Illuminate\Support\Facades\Blade;

class BladeExtend {

    public static function register()
    {
        Blade::directive('fa', function($expression){
            return "&lt;?php echo fa({$expression}); ?&lt;";
        });
    }
}