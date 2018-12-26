<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\UserEvent;
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
            'destroy'    => ['alias' => 'event.delete', 'parameters' => []],
            'create'     => ['alias' => 'create_event', 'parameters' => []],
        ])
        ->addQueryInstructions(function($query) {
            $query->select('events.*');
            $query->addSelect('organizations.nama_organization as nama_organization');
            $query->join('organizations', 'id_organization', '=', 'events.organization_id_organization');
        })
        // set the default number of rows to show in your table list.
        ->setRowsNumber(50)
        // show the rows number selector that will enable you to choose the number of rows to show.
        ->enableRowsNumberSelector()
        // add some query instructions for the special use cases
        // display some lines as disabled
        // you can now join some columns to your tablelist.
        // display the news image from a custom HTML element.
        // display the news title that is contained in the news table and use this field in the destroy confirmation modal.
        // this field will also be searchable in the search field.
        ->disableLines(function($model){
            return $model->id === 1 || $model->id === 2;
        }, ['disabled', 'bg-secondary'])
        // display some line as highlighted
        ->highlightLines(function($model){
            return $model->id === 3;
        }, ['highlighted', 'bg-success']);
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
            ->isLink(function($entity, $column){
                return route('edit_status', ['id' => $entity->id_event]);
            })
            ->isSearchable();
        
        return view('partials.tabelEvent',compact('table'));
    }
    public function view_user_event()
    {
        //$event = DB::table('events')->get();
        
        //dd($event);
        $table = app(TableList::class)
        // set the model namespace
        ->setModel(UserEvent::class)
        // set the route that will be targetted when the create / edit / delete button will be hit.
        ->setRoutes([
            'index'      => ['alias' => 'event.view', 'parameters' => []],
        ])
        ->addQueryInstructions(function($query) {
            $query->select('user_event.*');
            $query->addSelect('users.name_user as name_user');
            $query->addSelect('events.nama_event as nama_event');
            $query->join('users', 'users.id', '=', 'user_event.user_id');
            $query->join('events', 'id_event', '=', 'user_event.event_id');
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
        $table->addColumn('name_user')
            ->setTitle('Nama user')
            ->setCustomTable('users', 'name_user')
            ->isSortable()
            ->isSearchable();
        // display an abreviated content from a text with the number of caracters you want.
        $table->addColumn('nama_event')
            ->setTitle('Nama event')
            ->setCustomTable('events', 'nama_event')
            ->isSortable()
            ->isSearchable();
        // display a value from a sql alias
        // in this case, you will target the `users` table and the `author` field, and make this sortable and searchable.
        // this way, you tell the tablelist to manipulate the `name` attribute in the sql queries but to display the aliased `author` model attribute.
        return view('partials.UserEvent',compact('table'));
    }
    public function show($id)
    {
        return Event::find($id);
    }

    public function store(Request $request)
    {
        //dd($request);
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
          }
          
        $request->validate($valids);
        Organization::find($request->organization_id_organization)->events()->create([
            'nama_event' => $request->nama_event,
            'deskripsi_event' => $request->deskripsi_event,
            'time_start'=> $request->time_start,
            'time_finish'=> $request->time_finish,
            'tempat' => $request->tempat,
            'points_reward' => $request->points_reward,
            ]);
        return redirect('/viewEvent');
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
    public function edit($id)
    {
        $object = Event::find($id);
        if ($object->status == "pending"){
            $event = Event::find($id);
            return view('partials.confirmation',['id'=>$id]);
        }  else{
            return redirect()->back()->with('message', 'Event sudah dikonfirmasi');
        }
    }
    public function edit_update(Request $request,$id)
    {
        //dd($request);
        $object = Event::find($id);
        if ($object->status == "pending"){
            $event = Event::find($id)->update(['status'=>$request->status]);
            return redirect('/viewEvent')->with('message', 'Event berhasil dikonfirmasi');
        }  else{
            //dd($request);
            return redirect()->back()->with('message', 'Event sudah dikonfirmasi');
        }
    }
    public function delete($id)
    {
        //dd($id);
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('message', 'Event berhasil dihapus'); 
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
