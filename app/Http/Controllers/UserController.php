<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\storeUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $users  = User::select('name'  , 'email' , 'password' )->get();
        return view ('user.index' , compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }
    public function store(storeUserRequest $request)
    {
        $user = User::create([
            'name' => strip_tags($request->input('name')),
            'email' => strip_tags($request->input('email')),
            'status' => strip_tags($request->input('status')),
            'password' =>Hash::make(strip_tags($request->input('password')))
        ]);
        return response("data added");
    }
}
