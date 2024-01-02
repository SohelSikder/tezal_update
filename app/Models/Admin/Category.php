<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
      'en_Category_Name','en_Category_Slug','Status','en_Description','Category_Icon','fr_Category_Name','fr_Category_Slug','fr_Description','parent_id',
      'CategoryImage','CategoryBanner','category_type','is_featured','position', 'is_home_page_product',
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'Category_Id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
