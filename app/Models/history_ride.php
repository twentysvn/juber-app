<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_ride extends Model
{
    protected $table = 'history_ride';
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo(driver::class, "driver_id", "id");
    }
}
