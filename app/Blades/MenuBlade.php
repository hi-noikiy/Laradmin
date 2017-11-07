<?php

namespace App\Blades;

use Route;
use App\Models\Menu;
use Illuminate\Support\Facades\Blade;

class MenuBlade
{
    public static function boot()
    {
        Blade::if ('menu',
            function(Menu $menu) {
                return Route::has($menu->slug)
                    ? auth()->user()->can($menu->slug)
                    : ($menu->childers->count()
                        ? (boolean) $menu->childers->first(function($childer) {
                            return auth()->user()->can($childer->slug);
                        })
                        : false);
            }
        );
    }
}

