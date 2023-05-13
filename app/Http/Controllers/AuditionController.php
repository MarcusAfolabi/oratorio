<?php

namespace App\Http\Controllers;

use App\Models\Audition;
use App\Models\Answer;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\NewParticipantMail;
use App\Http\Requests\AuditionRequest;
use Illuminate\Support\Facades\Mail; 

class AuditionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['take', 'storeAnswer', 'participantEmail', 'registerQuiz']);
    }

    public function index()
    {
        $quizzes = Audition::all();
        return view('admin.quizzes.index', compact('quizzes'));
    }
    
    public function registerQuiz()
    {
        return view('auth.register');
    }

    public function take(Request $request)
    {
        $quizzes = Audition::inRandomOrder()->get();
        $email = $request->query('email');
        return view('admin.quizzes.take', compact('email', 'quizzes'));
    }


    public function store(AuditionRequest $request)
    {
        $quiz = new Audition();
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


    public function edit(Audition $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }


    public function update(Request $request, Quiz $quiz)
    {
        $quiz = Audition::findOrFail($quiz->id);
        $quiz->title = $request['title'];
        $quiz->optionA = $request['optionA'];
        $quiz->optionB = $request['optionB'];
        $quiz->optionC = $request['optionC'];
        $quiz->correctAnswer = $request['correctAnswer'];
        $quiz->save();
        return redirect(route('quizzes.index'))->with('status', 'Updated');
    }


    public function destroy(Audition $quiz)
    {
        $quiz->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

    public function participantEmail(Request $request, Participant $participant)
    {
      $request->validate([
    'email' => [
        'required',
        'email',
        Rule::unique('participants'),
        'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'dns'
    ]
]);
        $participant = new Participant();
        $participant->email = $request->email;
        $participant->save(); 
        Mail::to($participant->email)->send(new NewParticipantMail($participant));

        return redirect()->back()->with('status', 'Email verified! Check your email for the Oratorio handbook and Quiz link');
    }
}
