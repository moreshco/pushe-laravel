<?php

namespace Moreshco\PusheLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function users() {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }
}
