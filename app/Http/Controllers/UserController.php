<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\roles;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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
            'SELECT users.id, users.first_name AS first_name, users.last_name AS last_name, users.dni, users.phone_number, users.email, roles.name AS rol, companies.name AS companie
            FROM users, roles, companies
            WHERE roles.id = users.roles_id
            AND companies.id = users.companies_id'
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

        $user = user::find($id);

        $request->validate([

            'dni' => 'required|numeric|unique:users,id,' . $id,
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'email' => 'required',

        ]);

        if ($request->updated) {

            $request->validate([
                'img' => 'nullable|image'
            ]);
            
            $user->img = $this->validate_image($request);
            // Eliminar la imagen anterior
            // if (File::exists(public_path($user->img)))
            //     File::delete(public_path($user->img));

        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;        
        $user->save();
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

    public function validate_image($request) {

        if ($request->hasfile('img')) {
            $name = uniqid() . time() . '.' . $request->file('img')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('img')->storeAs('public', $name);
            return '/storage' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return null;
        }
    }
}
