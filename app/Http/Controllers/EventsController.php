<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events_list = events::all();
        // return $events_list;

        $events_list = DB::select(
            '
            SELECT events.title, events.start, events.end, events.color, events.time, clients.name AS client, users.name AS user
            FROM events, clients, users
            WHERE events.clients_id = clients.id
            AND events.users_id = users.id
            '
        );

        return response([
            'events_list' => $events_list
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
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'time' => 'required',
            'description' => 'required',
            'color' => 'required',
            'users_id' => 'required',
            'clients_id' => 'required',
            'reports_id' => 'required',
        ]);

        $new_event = events::create($request->all());
        $new_event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = events::find($id);
        $event -> delete();
    }
}
