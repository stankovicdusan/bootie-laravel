<?php

namespace App\Models;

class Categories{
    public $name;

	public function getAllCategories(){
		return \DB::table("categories")->get();
	}

	public function insert(){
	    return \DB::table("categories")
            ->insert([
                'name' => $this->name
            ]);
    }

    public function update($id){
        return \DB::table("categories")
            ->where("id", $id)
            ->update([
               "name" => $this->name
            ]);
    }

    public function delete($id){
	    return \DB::table("categories")
            ->where("id", $id)
            ->delete();
    }

    public function getOne($id){
	    return \DB::table("categories")
            ->where("id", $id)
            ->first();
    }
}
