<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = equipment::all();
        return $equipment;
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
        $request->validate([
            'name' => 'required|string',
            'serial' => 'required|unique:equipment',
            'clients_id' => 'required',
            'img' => 'nullable|image'
        ]);

        //Save image in server and get its url
        $url_image = $this->validate_image($request);

        $equipment = equipment::create([
            'name' => $request->name,
            'serial' => $request->serial,
            'clients_id' => $request->clients_id,
            'img' => $url_image,
        ]);

        return response(
            [
                'message' => 'Cliente creado exitósamente.',
                'new_equipment' => $equipment //Nuevo usuario creado
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipment $equipment)
    {
        //
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
