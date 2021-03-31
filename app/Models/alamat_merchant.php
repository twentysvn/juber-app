<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_merchant extends Model
{
    protected $table = 'alamat_merchant';
    protected $guarded = [];

    public function merchant()
    {
        return $this->belongsTo(merchant_layanan::class, 'mc_id', 'id');
    }
}
