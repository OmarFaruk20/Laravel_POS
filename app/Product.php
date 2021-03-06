<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'cost_price', 'price'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public static function ArrayForSelect() {
    	$arr = [];
    	$products = Product::all();
        foreach ($products as $product) {
            $arr[$product->id] = $product->title;
        }
        return $arr;
    }

}
