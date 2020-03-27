<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Roles;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelU = new User();
        $users = $modelU->getAll();

        return view("admin.users.index", [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelR = new Roles();
        $roles = $modelR->getAll();

        return view("admin.users.create", [
           'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            $model = new User();
            $model->firstName = $request->input("firstName");
            $model->lastName = $request->input("lastName");
            $model->username = $request->input("username");
            $model->email = $request->input("email");
            $model->password = $request->input("password");
            $model->id_role = $request->input("roleId");

            $model->insert();

            return redirect()->route("users.index")->with("success", "User added successfuly");
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
        $model = new User();
        $user = $model->getOneUser($id);

        $modelR = new Roles();
        $roles = $modelR->getAll();

        return view("admin.users.edit", [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try{
            $model = new User();
            $model->firstName = $request->input("firstName");
            $model->lastName = $request->input("lastName");
            $model->username = $request->input("username");
            $model->email = $request->input("email");
            $model->password = $request->input("password");
            $model->id_role = $request->input("roleId");
            $model->id = $id;

            $model->update();

            return redirect()->route("users.index")->with("success", "User updated successfuly");
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
            $model = new User();
            $model->delete($id);

            return redirect()->route("users.index")->with("success", "User deleted successfuly");
        }catch(\Exception $e){
            return redirect()->back()->with("error", "Error, send message to administrator for more information about error");
            \Log::critical($e->getMessage());
        }
    }
}
