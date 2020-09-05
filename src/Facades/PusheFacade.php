<?php

namespace Moreshco\PusheLaravel\Facades;

use Illuminate\Support\Facades\Facade;


class PusheFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pushe';
    }

    public static function routes()
    {
        \Route::middleware('guest')->post('/device/save', 'PusheDeviceController@saveDevice')->name('pushe.saveDevice');
    }
}
