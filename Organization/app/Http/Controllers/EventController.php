<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
class EventController extends Controller
{
    public function index()
    {
        $event = DB::table('events')->get();
        //dd($event);
        return view('partials.tabelEvent',compact('event'));
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
}
