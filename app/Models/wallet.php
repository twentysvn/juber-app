<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $table = 'wallet';
    protected $guarded = [];

    public function rides()
    {
        return $this->hasOne(history_ride::class, 'id', 'order_id');
    }
}
