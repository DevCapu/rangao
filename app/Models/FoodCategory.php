<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodCategory extends Model
{
    protected $fillable = ['category'];
    protected $table = 'foodCategories';
    public $timestamps = false;

    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
