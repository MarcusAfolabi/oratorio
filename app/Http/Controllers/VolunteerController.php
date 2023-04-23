<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Mail\MailVolunteer;
use App\Notifications\NotificationVolunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class VolunteerController extends Controller
{

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
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:volunteers|max:255',
            'phone' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'born_again' => 'required|string|max:5',
            'department' => 'required|string|max:255',
            'attendance' => 'required|string|max:5',
        ]);

        $volunteer = Volunteer::create([
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'location' => $validatedData['location'],
            'born_again' => $validatedData['born_again'],
            'department' => $validatedData['department'],
            'attendance' => $validatedData['attendance'],
        ]);
        Mail::to($volunteer->email)->send(new MailVolunteer($volunteer));
        Notification::route('mail', 'oratoriogroup@gmail.com')->notify(new NotificationVolunteer($volunteer));

        return redirect()->back();
    }


    public function show(Volunteer $volunteer)
    {
        //
    }


    public function edit(Volunteer $volunteer)
    {
        //
    }


    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }


    public function destroy(Volunteer $volunteer)
    {
        //
    }
}
