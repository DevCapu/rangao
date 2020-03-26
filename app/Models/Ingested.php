<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingested extends Model
{
    protected $table = 'ingested';
    protected $fillable = ['food_id', 'user_id', 'quantity', 'period', 'date', 'calories'];
    public $timestamps =  false;

    public function food():BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
