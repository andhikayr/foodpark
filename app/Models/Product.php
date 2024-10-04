<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'thumb_image',
        'short_description',
        'description',
        'price',
        'offer_price',
        'sku',
        'status',
        'show_at_home',
        'seo_title',
        'seo_description',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
