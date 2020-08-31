<?php

namespace Moreshco\PusheLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Moreshco\PusheLaravel\Skeleton\SkeletonClass
 */
class PusheLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pushe-laravel';
    }
}
