<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\EventMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Notification;

class ConcertController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:events|max:255',
            'phone' => 'required|string|max:255',
            'school' => 'required|string|max:255'
        ]);

        $event = Event::create([
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'school' => $validatedData['school'],
        ]);

        Mail::to($event->email)->send(new EventMail($event));
        Notification::route('mail', 'oratoriogroup@gmail.com')->notify(new EventNotification($event));

        return redirect()->back()->with('status', 'Thank you for your interest');
    }


    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        //
    }


    public function update(Request $request, Event $event)
    {
        //
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
