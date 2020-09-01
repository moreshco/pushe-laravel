<?php

namespace Moreshco\PusheLaravel\Traits;

use Moreshco\PusheLaravel\Models\Device;

trait Pushe
{
    public function devices()
    {
        return $this->belongsToMany(Device::class);
    }

    public function attachDevice($device) {
        $this->devices()->attach($device);
    }

    public function detachDevice($device) {
        $this->devices()->detach($device);
    }
}
