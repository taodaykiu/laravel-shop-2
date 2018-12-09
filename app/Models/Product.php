<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price'
    ];

    protected $casts=[
        'on_sale' => 'boolean'
    ];

    public function product_sku()
    {
        return $this->hasMany(ProductSku::class);
    }
}
