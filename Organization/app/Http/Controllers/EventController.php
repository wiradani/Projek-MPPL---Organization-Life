<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
class EventController extends Controller
{
    public function index()
    {
        return Event::all();
        //$event = DB::table('events')->get();
        //dd($event);
        //return view('partials.tabelEvent',compact('event'));
    }
 
    public function show($id)
    {
        return Event::find($id);
    }

    public function store(Request $request)
    {
        //dd($request);
        Event::create($request->all());
        return redirect('/tambahEvent');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function delete(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return 204;
    }

    public function userEventHistory(Request $request, $id){
        $user = DB::table('users')
            ->join('user_event', 'users.id', '=', 'user_event.user_id')
            ->join('events', 'user_event.event_id', '=', 'events.id_event')
            ->select('users.id','events.id_event','events.nama_event','events.deskripsi_event')
            ->where('users.id', '=', $id)
            ->get();
        return response()->json($user, 200);
    }
}
