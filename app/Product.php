<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getProducts($request){
        $products = $this->newQuery()->join("image_product", "image_product.id_product", "=", "products.id");

        if($request->has("category_id")){
            $products->where("id_category", $request->input("category_id"));
        }
        if($request->has("gendre_id")){
            $products->where("id_gendre", $request->input("gendre_id"));
        }
        if($request->has("search")){
            $products->where('name', 'LIKE', "%".$request->input("search")."%");
        }

        return $products->paginate(5);
    }

    protected $table = 'products';
}
