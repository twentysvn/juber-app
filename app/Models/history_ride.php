<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Hasone;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class history_ride extends Model
{
    protected $table = 'rides';
    protected $guarded = [];
    public function driver(): BelongsTo
    {
        return $this->belongsTo(driver::class, "driver_id", "id");
    }
}
