<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
