<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Models\User;
use DemeterChain\C;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Categories();

        $categories = $model->getAllCategories();

        return view("admin.categories.index", [
            'categ' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        try{
            $model = new Categories();
            $model->name = $request->input("name");

            $model->insert();

            return redirect()->route("categories.index")->with("success", "Category added successfuly");
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
        $model = new Categories();

        $category = $model->getOne($id);

        return view("admin.categories.edit", [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try{
            $model = new Categories();
            $model->name = $request->input("name");

            $model->update($id);

            return redirect()->route("categories.index")->with("success", "Category updated successfuly");
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
            $model = new Categories();
            $model->delete($id);

            return redirect()->route("categories.index")->with("success", "Category deleted successfuly");
        }catch(\Exception $e){
            return redirect()->back()->with("error", "Error, send message to administrator for more information about error");
            \Log::critical($e->getMessage());
        }
    }
}
