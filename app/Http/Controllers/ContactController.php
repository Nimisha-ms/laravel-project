<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function addcontact(){
    	return view('contact.add_contact');
    }

    public function storecontact(Request $request){

    	$validatefrm = $request->validate([ 
    			'name' => 'required',
    			'email' => 'required'
    		],[
    			'name.required' => 'Please enter name',
    			'email.required' => 'Please enter email'
    		]
    	);

        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');

        //Mail Parameters:
        $contactarr= $contact->toArray();
        $sendMailTo = config('constants.email_options.SEND_TO_ADMIN_EMAIL');
        $sendMailFrom = $request->get('email');

        Mail::send('contact.contactemail', $contactarr, function ($message) use ($sendMailTo,$sendMailFrom)
        {           
            $message->from($sendMailFrom);
            $message->to($sendMailTo)->subject('Contact Request');
        });

        $contact->save();
      
    	return redirect()->back()->with('success','Contact details added successfully');
    }
}
