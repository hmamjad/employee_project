<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Pickuppoint;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'pickup_point_id',
        'name',
        'code',
        'unit',
        'tags',
        'color',
        'size',
        'video',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'warehouse',
        'description',
        'thumbnail',
        'images',
        'featured',
        'today_deal',
        'status',
        'admin_id',
    ];
// Join with category
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
// Join with Subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
// Join with Childcategory
    public function childcategory(){
        return $this->belongsTo(Childcategory::class,'childcategory_id');
    }
// Join with Brand
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
// Join with Brand
    public function pickuppoint(){
        return $this->belongsTo(Pickuppoint::class,'pickup_point_id');
    }
}
															