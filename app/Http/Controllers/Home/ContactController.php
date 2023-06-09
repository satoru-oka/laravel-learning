<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\FuncCall;

class ContactController extends Controller
{
    public function Contact() {

        return view('frontend.contact');

    } // End Method

    public function StoreMessage(Request $request) {

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public  function ContactMessage() {

        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contacts'));

    } // End Method

    public  function DeleteMessage($id) {

        Contact::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    } // End Method
}
