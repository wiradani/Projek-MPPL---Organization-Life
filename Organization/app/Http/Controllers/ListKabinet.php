<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabinet;
use Illuminate\Support\Facades\DB;

class ListKabinet extends Controller
{
    public function index()
    {
      $kabinets = Cabinet::latest()->paginate(10);
      //dd($kabinets);
      $number = $kabinets->currentPage() * 10;
      $number -=10;
      return view('ListKabinet', compact('number', 'kabinets'));
    }
    public function delete(Cabinet $kabinet)
    {
      $kabinet>delete();
      return redirect('ListKabinet');
    }
    //
}
