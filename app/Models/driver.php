<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $table = 'drivers_profile';
    protected $guarded = [];
    public function history_ride()
    {
        return $this->hasOne(history_ride::class, "driver_id");
    }
}
