<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabinet;
use DB;
use Auth;
use App\Organization;
class CabinetController extends Controller
{
    public function index()
    {
        return Cabinet::all();
    }
 
    public function show($id)
    {
        return Cabinet::find($id);
    }

    public function store(Request $request)
    {
        //dd($request);
        //Cabinet::create($request->all());
        //$organization = Auth::user()->organizations()->get();
        Organization::find($request->organization_id_organization)->cabinets()->create([
            'nama_cabinet' => $request->nama_cabinet,
            'deskripsi_cabinet' => $request->deskripsi_cabinet,
            'periode_cabinet'=> $request->periode_cabinet
            ]);
        return redirect('/tambahKabinet');
    }
    public function view()
    {
        //Cabinet::create($request->all());
        $organization = Auth::user()->organizations()->get();
        //dd($organization);
        return view('partials.tambahKabinet',compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->update($request->all());

        return $cabinet;
    }

    public function delete(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->delete();

        return 204;
    }

    public function getDivisi(Request $request, $id){
        Cabinet::findOrFail($id);
        $cabinet = DB::table('cabinets')
        ->join('divisions', 'cabinets.id_cabinet', '=', 'divisions.cabinet_id')
            ->select('cabinets.id_cabinet','cabinets.nama_cabinet'
            ,'divisions.id_division','divisions.nama_division','divisions.deskripsi_division')
            ->get();
        return response()->json($cabinet, 200);
    }
}
