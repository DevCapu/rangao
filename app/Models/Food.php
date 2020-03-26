<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    protected $fillable = ['name', 'calories',  'base_qty', 'base_unity', 'category_id'];
    public $timestamps =  false;

    public function refrigerators(): HasMany
    {
        return $this->hasMany(Refrigerator::class);
    }

    public function category()
    {
        return $this->belongsTo(FoodCategory::Class);
    }

}
