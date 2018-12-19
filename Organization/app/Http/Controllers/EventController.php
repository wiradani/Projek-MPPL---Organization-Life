<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Organization;
use DB;
use Auth;
use Okipa\TableList;
class EventController extends Controller
{
    public function index()
    {
        return Event::all();
        //$event = DB::table('events')->get();
        //dd($event);
        //return view('partials.tabelEvent',compact('event'));
    }
     public function view()
    {
        //$event = DB::table('events')->get();
        
        //dd($event);
        $table = app(TableList::class)
        // set the model namespace
        ->setModel(Event::class)
        // set the route that will be targetted when the create / edit / delete button will be hit.
        ->setRoutes([
            'index'      => ['alias' => 'event.view', 'parameters' => []],
        ])
        // set the default number of rows to show in your table list.
        ->setRowsNumber(50)
        // show the rows number selector that will enable you to choose the number of rows to show.
        ->enableRowsNumberSelector()
        // add some query instructions for the special use cases
        // display some lines as disabled
        ->disableLines(function($model){
            return $model->id === 1 || $model->id === 2;
        }, ['disabled', 'bg-secondary'])
        // display some line as highlighted
        ->highlightLines(function($model){
            return $model->id === 3;
        }, ['highlighted', 'bg-success']);
        // you can now join some columns to your tablelist.
        // display the news image from a custom HTML element.
        // display the news title that is contained in the news table and use this field in the destroy confirmation modal.
        // this field will also be searchable in the search field.
        $table->addColumn('id_event')
            ->setTitle('id event')
            ->isSortable()
            ->isSearchable()
            ->useForDestroyConfirmation();
        // display an abreviated content from a text with the number of caracters you want.
        $table->addColumn('nama_event')
            ->setStringLimit(30);
        // display a value from a sql alias
        // in this case, you will target the `users` table and the `author` field, and make this sortable and searchable.
        // this way, you tell the tablelist to manipulate the `name` attribute in the sql queries but to display the aliased `author` model attribute.
        $table->addColumn('deskripsi_event')
            ->setCustomTable('events', 'deskripsi_event')
            ->isSortable()
            ->isSearchable();
        // display the category with a custom column title, as a button, prefixed with an icon and with a value contained in config.
        // display a button to preview the news
        $table->addColumn()
            ->isLink(function($entity, $column){
                return route('news.show', ['id' => $entity->id]);
            })
            ->isButton(['btn', 'btn-sm', 'btn-primary']);
        // display the formatted release date of the news and choose to sort the list by this field by default.
        $table->addColumn('time_start')
            ->isSortable()
            ->sortByDefault('desc')
            ->setColumnDateTimeFormat('d/m/Y H:i:s');
        return view('partials.tabelEvent',compact('table'));
    }
 
    public function show($id)
    {
        return Event::find($id);
    }

    public function store(Request $request)
    {
        //dd($request);
        Organization::find($request->organization_id_organization)->events()->create([
            'nama_event' => $request->nama_event,
            'deskripsi_event' => $request->deskripsi_event,
            'time_start'=> $request->time_start,
            'time_finish'=> $request->time_finish,
            'tempat' => $request->tempat,
            'points_reward' => $request->points_reward,
            ]);
        return redirect('/tambahEvent');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function view_tambah()
    {
        $organization = Auth::user()->organizations()->get();
        return view('partials.formEvent',compact('organization'));
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
