<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    protected $fillable = [
        'name',
        'base_qty',
        'base_unit',
        'calories',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }

    public function refrigerators(): BelongsToMany
    {
        return $this->belongsToMany(Refrigerator::class, 'foodRefrigerator')
            ->using(FoodRefrigerator::class)
            ->withPivot(['quantity', 'expiration_date', 'notification']);
    }
}
