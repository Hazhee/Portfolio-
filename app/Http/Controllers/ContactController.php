<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.page.contact');
    }

    public function store(Request $request)
    {
        Contact::insert([
            'name' =>$request->name,
            'email' =>$request->email,
            'number' =>$request->phone,
            'subject' =>$request->subject,
            'message' =>$request->message,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Message been submited.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllContact()
    {
        $data = Contact::latest()->get();
        return view('admin.contact.index',compact('data'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'The Message been Deleted.',
            'alert-type' => 'success'
        );
        return redirect()->route('contact.all')->with($notification);

    }
}
