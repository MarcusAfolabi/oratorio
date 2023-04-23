<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Contact;
use App\Mail\MailContact;
use App\Models\Testimonial;
use App\Mail\MailSubscriber;
use Illuminate\Http\Request;
use App\Mail\MailTestimonial;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NotificationContact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotificationSubscriber;
use App\Notifications\NotificationTestimonial;

class ContactController extends Controller
{
    
    public function index()
    {
        //
    }
  
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:contacts|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1055', 
        ]);

        $contact = Contact::create([
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'], 
        ]);
        Mail::to($contact->email)->send(new MailContact($contact));
        Notification::route('mail', 'oratoriogroup@gmail.com')->notify(new NotificationContact($contact));
        return redirect()->back();

    } 
 
    public function testify(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|unique:testimonials|max:255',
            'name' => 'required|string|unique:testimonials|255',
            'content' => 'required|string|unique:testimonials|500',
            'photo' => 'required|string|unique:testimonials|255',
            'location' => 'required|string|255',
        ]);

        $testify = Testimonial::create([
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'content' => $validatedData['content'],
            'photo' => $validatedData['photo'],
            'location' => $validatedData['location'],
        ]);

        Mail::to($testify->email)->send(new MailTestimonial($testify));
        Notification::route('mail', 'oratoriogroup@gmail.com')->notify(new NotificationTestimonial($testify));

        return redirect()->back();

    } 
 

    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back();
    }
}
