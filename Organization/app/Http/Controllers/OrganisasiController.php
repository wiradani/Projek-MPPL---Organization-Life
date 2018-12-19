<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use DB;
use Okipa\TableList;
use App\User;
use Auth;
class OrganizationController extends Controller
{
    public function index()
    {
        return Organization::all();
        //$Organization = DB::table('Organizations')->get();
        //dd($Organization);
        //return view('partials.tabelOrganization',compact('Organization'));
    }
     public function view()
    {
        //$Organization = DB::table('Organizations')->get();
        
        //dd($Organization);
        $table = app(TableList::class)
        // set the model namespace
        ->setModel(Organization::class)
        // set the route that will be targetted when the create / edit / delete button will be hit.
        ->setRoutes([
            'index'      => ['alias' => 'Organization.view', 'parameters' => []],
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
        $table->addColumn('id_Organization')
            ->setTitle('id Organization')
            ->isSortable()
            ->isSearchable()
            ->useForDestroyConfirmation();
        // display an abreviated content from a text with the number of caracters you want.
        $table->addColumn('nama_Organization')
            ->setStringLimit(30);
        // display a value from a sql alias
        // in this case, you will target the `users` table and the `author` field, and make this sortable and searchable.
        // this way, you tell the tablelist to manipulate the `name` attribute in the sql queries but to display the aliased `author` model attribute.
        $table->addColumn('deskripsi_Organization')
            ->setCustomTable('Organizations', 'deskripsi_Organization')
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
        return view('partials.tabelOrganization',compact('table'));
    }
 
    public function show($id)
    {
        return Organization::find($id);
    }

    public function store(Request $request)
    {
        dd($request);
    	Auth::user()->organizations()->create([$request]);
        return redirect('/tambahOrganization');
    }

    public function update(Request $request, $id)
    {
        $Organization = Organization::findOrFail($id);
        $Organization->update($request->all());

        return $Organization;
    }

    public function delete(Request $request, $id)
    {
        $Organization = Organization::findOrFail($id);
        $Organization->delete();

        return 204;
    }

    public function userOrganizationHistory(Request $request, $id){
        $user = DB::table('users')
            ->join('user_Organization', 'users.id', '=', 'user_Organization.user_id')
            ->join('Organizations', 'user_Organization.Organization_id', '=', 'Organizations.id_Organization')
            ->select('users.id','Organizations.id_Organization','Organizations.nama_Organization','Organizations.deskripsi_Organization')
            ->where('users.id', '=', $id)
            ->get();
        return response()->json($user, 200);
    }
}
