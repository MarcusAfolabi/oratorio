<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function participantEmail(Request $request, Participant $participant)
    {
        $request->validate([
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
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
        
        return redirect()->back()->with('status', 'Check your email for the Oratorio handbook');
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
