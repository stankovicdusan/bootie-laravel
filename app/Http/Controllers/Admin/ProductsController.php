<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Gendre;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Products();
        $products = $model->getAllProducts();

        return view("admin.products.index", [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelBrand = new Categories();
        $modelGendre = new Gendre();

        $categories = $modelBrand->getAllCategories();
        $gendre = $modelGendre->getAllGendres();


        return view("admin.products.create", [
            'categories' => $categories,
            'gendre' => $gendre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $fileName = 'images/' . time() . "_" . $fileName;

        try{
            $file->move(public_path("images"), $fileName);

            $model = new Products();
            $model->name = $request->input("name");
            $model->description = $request->input("description");
            $model->pictFile = $fileName;
            $model->gendreId = $request->input("gendreId");
            $model->categoryId = $request->input('categoryId');
            $model->price = $request->input("price");

            $model->insert();

            return redirect()->route("products.index")->with("success", "Product added successfuly");
        }catch(\Exception $e){
            return redirect()->back()->with("error", "Error, send message to administrator for more information about error");
            \Log::critical($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelBrand = new Categories();
        $modelGendre = new Gendre();

        $categories = $modelBrand->getAllCategories();
        $gendre = $modelGendre->getAllGendres();

        $model = new Products();
        $product = $model->getOneProduct($id);

        return view("admin.products.edit", [
            "singleProduct" => $product,
            "categories" => $categories,
            "gendre" => $gendre
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $image_name = $request->input("hidden_image");
        $image = $request->file("image");

        if($image != ''){
            $image_name = "images/" . time() . $image->getClientOriginalName();
            $image->move(public_path("images"), $image_name);
        }

        try{
            $model = new Products();
            $model->name = $request->input("name");
            $model->description = $request->input("description");
            $model->pictFile = $image_name;
            $model->gendreId = $request->input("gendreId");
            $model->categoryId = $request->input('categoryId');
            $model->price = $request->input("price");
            $model->idProduct = $id;

            $model->update();

            return redirect()->route("products.index")->with("success", "Product updated successfuly");
        }catch(\Exception $e){
            return redirect()->back()->with("error", "Error, send message to administrator for more information about error");
            \Log::critical($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $model = new Products();
            $model->idProduct = $id;

            $model->delete();

            return redirect()->route("products.index")->with("success", "Product deleted successfuly");
        }catch(\Exception $e){
            return redirect()->back()->with("error", "Error, send message to administrator for more information about error");
            \Log::critical($e->getMessage());
        }

    }
}
