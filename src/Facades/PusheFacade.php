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
        Route::post('/device/save', [
            'uses' => 'PusheDeviceController@saveDevice',
        ])->name('pushe.saveDevice');
    }
}
