<?php

namespace App\Models;

class User{

    public $id;
	public $firstName;
	public $lastName;
	public $username;
	public $email;
	public $password;
	public $id_role;

    public function getAll(){
        return \DB::table("users")
            ->join("roles", "users.id_role", "=", "roles.id")
            ->select("users.*", "roles.name")
            ->get();
    }

	public function insert(){
		return \DB::table("users")->insert([
			'firstName' => $this->firstName,
			'lastName' => $this->lastName,
			'username' => $this->username,
			'email' => $this->email,
			'password' => md5($this->password),
			'id_role' => $this->id_role
		]);
	}

	public function update(){
        return \DB::table("users")
            ->where('id', $this->id)
            ->update([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'username' => $this->username,
                'email' => $this->email,
                'password' => md5($this->password),
                'id_role' => $this->id_role
            ]);
    }

    public function delete($id){
        return \DB::table("users")
            ->where("id", $id)
            ->delete();
    }

	public function getUser($username, $password){
		return \DB::table("users")
			->join("roles", "users.id_role", "=", "roles.id")
			->where([
				"username" => $username,
				"password" => md5($password)
			])
			->first();
	}

	public function getOneUser($id){
        return \DB::table("users")
            ->join("roles", "users.id_role", "=", "roles.id")
            ->where([
                "users.id" => $id
            ])
            ->first();
    }
}
