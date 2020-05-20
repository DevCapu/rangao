<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Refrigerator extends Model
{
    protected $fillable = ['user_id'];
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'foodRefrigerator', 'refrigerator_id', 'food_id')
            ->using(FoodRefrigerator::class)
            ->withPivot(['quantity', 'expiration_date', 'notification']);
    }
}
