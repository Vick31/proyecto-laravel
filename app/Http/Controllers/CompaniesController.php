<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companie_list = DB::select(
            '
            SELECT *
            FROM companies
            WHERE companies.deleted_at is NULL
            '
        );

        $companie_list_deleted = DB::select(
            '
            SELECT *
            FROM companies
            WHERE companies.deleted_at is NOT NULL
            '
        );

        return response([
            'companies_list' => $companie_list,
            'companies_delete' => $companie_list_deleted,
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'address' => 'required|string',
            'email' => 'required',
        ]);

        $new_user = companies::create($request->all());
        $new_user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'address' => 'required|string',
            'email' => 'required',
        ]);
        
        $companie = companies::find($id);  
        $companie->fill($request->all())->save();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $companie = companies::find($id);
      $companie ->delete();
      
      return response([]);
    }
    public function restore($id)
    {
        $companie = companies::withTrashed()->find($id);
        $companie->restore();
        return response([
            'message' => 'cliente restablecido'
        ]);
    }
}
