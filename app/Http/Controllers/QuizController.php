<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ParticipantEmailNotification;

class QuizController extends Controller
{
    public function participantEmail(Request $request, Participant $participant)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:participants', function ($attribute, $value, $fail) {
                [$user, $domain] = explode('@', $value);
                $mxRecords = dns_get_record($domain, DNS_MX);

                // Check if MX records exist and have a valid priority value
                if (empty($mxRecords) || !array_filter($mxRecords, function ($record) {
                    return isset($record['pri']) && $record['pri'] > 0;
                })) {
                    $fail('The email domain is invalid.');
                }

                // Verify email existence using SMTP
                $validator = new \Egulias\EmailValidator\EmailValidator();
                $isValid = $validator->isValid($value, new \Egulias\EmailValidator\Validation\RFCValidation());

                if (!$isValid) {
                    $fail('The email address is invalid.');
                }
            }],
        ]);

        $participant->email = $request->email;
        $participant->save();

        // Notification::route('mail', [
        //     'oratoriogroup@gmail.com' => 'Alert! New participant has picked up the Handbook',
        // ])->notify(new ParticipantEmailNotification($participant));

        // Notification::send($participant->email, new ParticipantEmailNotification($participant));
        // Notification::send($participant, new ParticipantEmailNotification($participant));
        // $participant->sendEmailVerificationNotification();

        return redirect()->back()->with('status', 'Email verified! Check your email for the Oratorio handbook and Quiz link');
    }


    public function index()
    {
        $quizes = Quiz::all();
        return view('admin.quiz.index', compact('quizes'));
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Quiz $quiz)
    {
        //
    }


    public function update(Request $request, Quiz $quiz)
    {
        //
    }


    public function destroy(Quiz $quiz)
    {
        //
    }
}
