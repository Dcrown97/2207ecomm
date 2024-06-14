<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function index(){
        return view('contacts.index', ['contacts'=> Contact::orderBy('created_at', 'desc')->paginate(20)]);
    }

    public function view( $id = null){
        if($id == null) return back()->with('failed', ['Invalid URL!']);
        $contact = Contact::find($id);
        if($contact == null) return back()->with('failed', ['Contact not found!']);
        return view('contacts.view', ['contact'=>$contact]);
    }

    public function delete( $id = null){
        if($id == null) return back()->with('failed', ['Invalid URL!']);
        $contact = Contact::find($id);
        $contact->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
