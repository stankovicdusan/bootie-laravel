<?php

namespace App\Models;

class Gendre{
	public function getAllGendres(){
		return \DB::table("gendre")->get();
	}
}