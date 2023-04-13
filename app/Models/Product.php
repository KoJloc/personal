<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Traits\Filterable;

class Product extends Model
{

    use Filterable;


    protected $table = 'products';
    protected $guarded = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
