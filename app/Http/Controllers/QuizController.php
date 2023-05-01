<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ParticipantEmailNotification;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['take', 'storeAnswer', 'participantEmail']);
    }

    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function take(Request $request)
    {
        $quizzes = Quiz::inRandomOrder()->get();
        $email = $request->query('email');
        return view('admin.quizzes.take', compact('email', 'quizzes'));
    }


    public function store(QuizRequest $request)
    {
        $quiz = new Quiz();
        $quiz->title = $request['title'];
        $quiz->optionA = $request['optionA'];
        $quiz->optionB = $request['optionB'];
        $quiz->optionC = $request['optionC'];
        $quiz->correctAnswer = $request['correctAnswer'];
        $quiz->save();
        return redirect()->back()->with('status', 'Added');
    }

    public function storeAnswer(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|unique:answers',
            'chosenAnswer' => 'required',
        ]);

        $participant = new Answer();
        $participant->participant_id = $request->input('participant_id');
        $participant->chosenAnswer = json_encode($request->input('chosenAnswer'));
        $questions = collect($request->input('question'))->map(function ($question) {
            return str_replace('_', ' ', $question);
        })->toArray();
        $participant->question = implode(',', $questions);
        $participant->save();
        return redirect()->back()->with('status', 'Submitted! You will hear from us if you pass this test.');
    }

    public function answered(){
        $answers = Answer::all();
        return view('admin.quizzes.answer', compact('answers'));
    }


    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }


    public function update(Request $request, Quiz $quiz)
    {
        $quiz = Quiz::findOrFail($quiz->id);
        $quiz->title = $request['title'];
        $quiz->optionA = $request['optionA'];
        $quiz->optionB = $request['optionB'];
        $quiz->optionC = $request['optionC'];
        $quiz->correctAnswer = $request['correctAnswer'];
        $quiz->save();
        return redirect(route('quizzes.index'))->with('status', 'Updated');
    }


    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

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
        $participant->sendEmailVerificationNotification();

        return redirect()->back()->with('status', 'Email verified! Check your email for the Oratorio handbook and Quiz link');
    }
}
