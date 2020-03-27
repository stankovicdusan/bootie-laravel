<?php


namespace App\Models;


class Roles
{
    public function getAll(){
        return \DB::table("roles")->get();
    }
}
