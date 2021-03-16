<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;
    protected $table = "rekenings";
    public function bank(){
        return $this->belongsTo(bank::class, "bank_id"); 
    }
}
