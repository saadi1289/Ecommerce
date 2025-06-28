<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'stock',
        'sku',
        'category_id',
        'main_image',
        'gallery_images',
        'is_active',
        'visibility',
        'color',
        'size',
        'sale_price',
        'tags',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


}
