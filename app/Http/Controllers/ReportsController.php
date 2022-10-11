<?php

namespace App\Http\Controllers;

use App\Models\reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports_list = reports::all();
        return $reports_list;
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
            'description' => 'required|string',
        ]);

        $reports_list = reports::create($request->all());
        $reports_list->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show(reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(reports $reports)
    {
        //
    }
}
