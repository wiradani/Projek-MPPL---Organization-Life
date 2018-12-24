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
            'edit'    => ['alias' => 'event.edit', 'parameters' => []],
            'destroy'    => ['alias' => 'event.delete', 'parameters' => ['id']],
        ])
        ->addQueryInstructions(function($query) {
            $query->select('events.*');
            $query->addSelect('organizations.nama_organization as nama_organization');
            $query->join('organizations', 'id_organization', '=', 'events.organization_id_organization');
        })
        // set the default number of rows to show in your table list.
        ->setRowsNumber(50)
        // show the rows number selector that will enable you to choose the number of rows to show.
        ->enableRowsNumberSelector();
        // add some query instructions for the special use cases
        // display some lines as disabled
        // you can now join some columns to your tablelist.
        // display the news image from a custom HTML element.
        // display the news title that is contained in the news table and use this field in the destroy confirmation modal.
        // this field will also be searchable in the search field.
        $table->addColumn('id_event')
            ->setTitle('Id event')
            ->isSortable()
            ->useForDestroyConfirmation();
        $table->addColumn('nama_organization')
            ->setTitle('Nama organisasi')
            ->setCustomTable('organizations', 'nama_organization')
            ->isSortable()
            ->useForDestroyConfirmation()
            ->isSearchable();
        // display an abreviated content from a text with the number of caracters you want.
        $table->addColumn('nama_event')
            ->setTitle('Nama event')
            ->isSortable()
            ->useForDestroyConfirmation()
            ->isSearchable();
        // display a value from a sql alias
        // in this case, you will target the `users` table and the `author` field, and make this sortable and searchable.
        // this way, you tell the tablelist to manipulate the `name` attribute in the sql queries but to display the aliased `author` model attribute.
        $table->addColumn('deskripsi_event')
            ->setTitle('Deskripsi event')
            ->isSortable()
            ->isSearchable();
        // display the category with a custom column title, as a button, prefixed with an icon and with a value contained in config.
        // display a button to preview the news
        // display the formatted release date of the news and choose to sort the list by this field by default.
        $table->addColumn('points_reward')
            ->setTitle('Nilai Reward')
            ->isSortable()
            ->isSearchable();
        $table->addColumn('tempat')
            ->setTitle('Tempat penyelenggaraan')
            ->isSortable()
            ->isSearchable();
        $table->addColumn('time_start')
            ->setTitle('Waktu mulai event ')
            ->isSortable()
            ->sortByDefault('desc')
            ->setColumnDateTimeFormat('d/m/Y H:i:s')
            ->isSearchable();
        $table->addColumn('time_finish')
            ->setTitle('Waktu selesai event')
            ->isSortable()
            ->setColumnDateTimeFormat('d/m/Y H:i:s')
            ->isSearchable();
        $table->addColumn('status')
            ->setTitle('Status penerimaan')
            ->isSortable()
            ->isButton(['btn', 'btn-sm', 'btn-outline-primary'])
            ->isSearchable();
        
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
