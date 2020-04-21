<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController2 extends Controller
{
    //Use this so that guests cannot access by typing "admin/users or author/users" into the URL
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except([1]);
        return view ('author.users.index')->with('users', $users);
    }

/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {

        if(Gate::denies('edit-users')){
            return redirect(route('author.users.index'));
        }

        $roles = Role::all();

        return view('author.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

}
