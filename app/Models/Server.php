<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
