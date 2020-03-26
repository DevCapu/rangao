<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Refrigerator extends Model
{
    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
        'expiration_date',
        'notification'
    ];
    public $timestamps = false;

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
