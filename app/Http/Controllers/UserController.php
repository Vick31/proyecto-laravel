<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\roles;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select(
            '
            SELECT users.id, users.first_name AS first_name, users.first_name AS last_name, users.dni, users.phone_number, users.email, roles.name AS rol, companies.name AS companie
            FROM users, roles, companies
            WHERE roles.id = users.roles_id
            AND companies.id = users.companies_id
            '
        );

        return response([
            'users_list' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'img' => 'require',
            'dni' => 'required|numeric|unique:users,id,' . $id,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'email' => 'required',

        ]);
        
        $user = user::find($id);  
        $user->fill($request->all())->save();  
([
            'dni' => 'required|numeric|digits_between:1,10|unique:users,id,' . $id,
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'email' => 'required',
            'roles' => 'required',

        ]);

        $user = user::find($id);
        $user->fill($request->all())->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();

        return response([]);
    }
}
