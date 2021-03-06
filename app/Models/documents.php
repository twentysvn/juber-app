<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $table = "documents";
    protected $guarded = [];
    public function driver()
    {
        return $this->belongsTo(driver::class, "driver_id", "id");
    }
}
