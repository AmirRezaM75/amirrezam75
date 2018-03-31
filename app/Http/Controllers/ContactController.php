<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('panel.admin.layouts.contact.contact_edit',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect('/admin/contact/manage');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        Session::flash('deleted_contact','The Message has been deleted successfully');
        return redirect('/admin/contact/manage');

    }

    public function createMessage(Request $request)
    {
        Contact::create($request->all());
        return redirect('/');
    }

    public function manage()
    {
        $contacts = Contact::all();
        return view('panel.admin.layouts.contact.contact_manage',compact('contacts'));
    }
}
