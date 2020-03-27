<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Gendre;
use App\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index(Request $request){
    	$modelC = new Categories();
    	$modelG = new Gendre();

    	$products = $this->product->getProducts($request);
    	$categories = $modelC->getAllCategories();
    	$gendre = $modelG->getAllGendres();

    	return view("pages.home", [
    		"products" => $products,
    		"categories" => $categories,
    		"gendre" => $gendre
    	]);
    }

    public function getProducts(Request $request){
        $products = $this->product->getProducts($request);

        if($products){
            return response($products, 200);
        }
        else{
            return response($products,  500);
        }
    }

    public function single($id){
        $model = new Products();
        $product = $model->getOneProduct($id);

        return view("pages.single", [
            "product" => $product
        ]);
    }

    public function comingsoon(){
        return view("pages.coming-soon");
    }



}
