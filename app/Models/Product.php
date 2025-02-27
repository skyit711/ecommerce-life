<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "slug",
        "description",
        "price",
        "stock_quantity",
        "published",
        "show_on_homepage",
        "notify_admin_for_quantity_below",
        "order_minimum_quantity",
        "order_maximum_quantity",
        "not_returnable"
    ];


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

}
