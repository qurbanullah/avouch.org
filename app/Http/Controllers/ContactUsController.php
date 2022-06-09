<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactUs;

use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contactForm()
    {
        return view('contact-us');
    }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        ContactUs::create($input);

        //  Send mail to admin
        Mail::send('contact-us-mail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ), function($message) use ($request){
            $message->from('contact-us@avouch.org');
            $message->to('contact-us@avouch.org', 'Admin')->subject($request->get('subject'));
        });
        return redirect()->back()->with(['success' => 'Thank you for your precious time. We will contact back you soon.']);
    }
}
