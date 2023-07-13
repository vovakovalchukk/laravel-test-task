<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Capacity extends Model
{
    use HasFactory;

    protected $table = 'capacities';

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
