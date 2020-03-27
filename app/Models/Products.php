<?php

namespace App\Models;

class Products{
    public $name;
    public $price;
    public $description;
    public $gendreId;
    public $categoryId;
    public $pictFile;
    public $idProduct;

	public function getAllProducts(){
		return \DB::table("products")
            ->join("image_product", "products.id", "=", "image_product.id_product")
            ->paginate(5);
	}

	public function getOneProduct($id){
        return \DB::table("products")
            ->join("image_product", "products.id", "=", "image_product.id_product")
            ->select("products.*", "image_product.*")
            ->where([
                "products.id" => $id
            ])->get()->first();
    }

    public function insert(){
	    try{
            \DB::transaction(function(){
                $id = \DB::table("products")->insertGetId([
                    'name' => $this->name,
                    'price' => $this->price,
                    'description' => $this->description,
                    'id_category' => $this->categoryId,
                    'id_gendre' => $this->gendreId
                ]);

                \DB::table("image_product")->insert([
                    'alt' => $this->name,
                    'src' => $this->pictFile,
                    'id_product' => $id
                ]);
            });
        }catch(\Throwable $e){
	        \Log::critical("Failed to insert product");
	        throw new \Exception("Fail to add");
        }
    }

    public function update(){
	    try{
	        \DB::transaction(function(){
                \DB::table("products")
                    ->where("id", $this->idProduct)
                    ->update([
                    'name' => $this->name,
                    'price' => $this->price,
                    'description' => $this->description,
                    'id_category' => $this->categoryId,
                    'id_gendre' => $this->gendreId
                ]);

                \DB::table("image_product")
                    ->where("id_product", $this->idProduct)
                    ->update([
                        'alt' => $this->name,
                        'src' => $this->pictFile,
                        'id_product' => $this->idProduct
                    ]);
            });
        }catch(\Throwable $e){
	        \Log::critical("Failed to update product");
	        throw new \Exception("Fail to update");
        }
    }

    public function delete(){
	    try{
            \DB::transaction(function(){

                \DB::table("image_product")
                    ->where("id_product", $this->idProduct)
                    ->delete();

                \DB::table("products")
                    ->where("id", $this->idProduct)
                    ->delete();
            });
        }catch(\Throwable $e){
            \Log::critical("Failed to delete product");
            throw new \Exception("Fail to delete");
        }
    }
}
