<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Hasone;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class driver extends Model
{
    protected $table = 'drivers';
    protected $guarded = [];
    public function history_ride(): HasOne
    {
        return $this->hasOne(history_ride::class);
    }
    public function documents(): HasMany
    {
        return $this->hasMany(documents::class);
    }
}
