<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'brand_id',
        'category_id',
    ];
       
    
    public function brand()
    {
       return $this-> belongsTo(Brand::class);
    }

    public function category()
    {
       return $this-> belongsTo(Category::class);
    }

    public function variant(): HasMany
    {
       return $this-> hasMany(Variant::class);
    }

    public function image(): HasMany
    {
       return $this-> hasMany(ProductImage::class);
    }
}
