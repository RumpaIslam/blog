<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('Frontend.contact');
    }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        Mail::send('Frontend.contactMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'user_message' => $input['message']
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('rumpa.islam628780@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'We have receive your message successfully']);
    }
}
