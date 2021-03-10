<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class driver extends Model
{
    protected $table = 'drivers';
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(documents::class, 'driver_id', 'id');
    }
}
