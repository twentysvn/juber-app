<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history_ride extends Model
{
    protected $table = 'rides';
    protected $guarded = [];

    public function driver()
    {
        return $this->hasOne(driver::class, 'id', 'driver_id');
    }
}
