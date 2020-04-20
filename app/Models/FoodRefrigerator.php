<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodRefrigerator extends Pivot
{
    protected $fillable = [
        'food_id',
        'refrigerator_id',
        'quantity',
        'expiration_date',
        'notification'
    ];
    public $timestamps = false;
    protected $table = 'foodRefrigerator';
}
