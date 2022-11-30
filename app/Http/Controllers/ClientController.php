<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\clients;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_list = DB::select(
            '
            SELECT *
            FROM clients
            WHERE clients.deleted_at is NULL
            '
        );

        $client_list_deleted = DB::select(
            '
            SELECT *
            FROM clients
            WHERE clients.deleted_at is NOT NULL
            '
        );

        return response([
            'clients' => $client_list,
            'clients_delete' => $client_list_deleted,
        ]);

        // $clients_list = clients::all();
        // return $clients_list;
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
            'dni' => 'required|numeric|digits_between:1,9|unique:clients',
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'address' => 'required|string',
            'email' => 'required',
        ]);

        $new_user = clients::create($request->all());
        $new_user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(clients $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'dni' => 'required|numeric|digits_between:1,9|unique:clients'. $id,
            'name' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,10',
            'address' => 'required|string',
            'email' => 'required',
        ]);
        
        $client= clients::find($id);  
        $client->fill($request->all())->save();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client = clients::find($id);
      $client ->delete();
      
      return response([]);
    }
    public function restore($id)
    {
        $client = clients::withoutTrashed()->find($id);
        $client->restore();
        return response([
            'message' => 'cliente restablecido '
        ]);
    }
}
