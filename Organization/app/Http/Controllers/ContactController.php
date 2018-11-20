<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::all();
    }
 
    public function show($id)
    {
        return Contact::find($id);
    }

    public function store(Request $request)
    {
        return Cabinet::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }

    public function delete(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return 204;
    }
}