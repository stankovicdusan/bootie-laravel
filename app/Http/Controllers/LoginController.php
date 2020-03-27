<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $model;

    public function __construct(){
    	$this->model = new User();
    }

    public function login(){
    	return view("pages.login");
    }

    public function doLogin(Request $request){
    	try{
            $user = $this->model->getUser($request->input("username"), $request->input("password"));

            session()->put("user", $user);

            $modelS = new Statistics();
            $current_date = date("Y-m-d H:i:s");
            $modelS->date = $current_date;
            $modelS->message = "User with username ". session()->get("user")->username ." logged in!";

            $modelS->insertMessage();

            return redirect()->route("home")->with("success", "You have logged in successfully");
        }catch(\Exception $e){
    	    \Log::critical("Login error " . $e->getMessage());
    	    return redirect()->back()->with("error", "Wrong login parameters");
        }
    }

    public function register(){
    	return view("pages.register");
    }

    public function doRegister(RegisterUserRequest $request){
    	$this->model->firstName = $request->input("firstName");
    	$this->model->lastName = $request->input("lastName");
    	$this->model->username = $request->input("username");
    	$this->model->email = $request->input("email");
    	$this->model->password = $request->input("password");
    	$this->model->id_role = 1;

    	try{
    		$this->model->insert();

    		$modelS = new Statistics();
            $current_date = date("Y-m-d H:i:s");
    		$modelS->date = $current_date;
    		$modelS->message = "New user joined our community!";

    		$modelS->insertMessage();

    		return redirect()->route("login")->with("success", "Registration successful, you can login now.");
    	}catch(QueryException $e){
    		\Log::info("Neuspela registracija: " .  $e->getMessage());
    		return redirect()->route("register")->with("error", "An server error has occurred, please try again later.");
    	}
    }

    public function logout(){
        $modelS = new Statistics();
        $current_date = date("Y-m-d H:i:s");
        $modelS->date = $current_date;
        $modelS->message = "User with username ". session()->get("user")->username ." logged out!";

        $modelS->insertMessage();

        session()->forget("user");

    	return redirect()->route("home");
    }
}
