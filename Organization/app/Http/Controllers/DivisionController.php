<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Auth;
use App\Cabinet;

class DivisionController extends Controller
{
    public function index()
    {
        return Division::all();
    }
    public function show($id)
    {
        return Division::find($id);
    }
    public function view_tambah()
    {
        if (!Auth::check()) return view('/login');
        $cabinet = Auth::user()->organizations()->find(1)->cabinets()->get();
       // dd($cabinet);
        return view('partials.tambahDivisi',compact('cabinet'));
    }
 
    public function store(Request $request)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
          }
          
        $request->validate($valids);
        Cabinet::find($request->cabinet_id_cabinet)->divisions()->create([
            'nama_division' => $request->nama_division,
            'deskripsi_division' => $request->deskripsi_division,
            ]);
        return redirect('/tambahDivisi')->with('message', 'Divisi berhasil dikonfirmasi');;
    }

    public function update(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $division->update($request->all());

        return $division;
    }

    public function delete(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return 204;
    }
}
