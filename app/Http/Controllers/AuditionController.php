<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\NewParticipantMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\QuestionReuest;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ParticipantEmailNotification;

class AuditionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'testParticipant', 'takeTest', 'submitTest', 'finishTest']);
    }

    public function index()
    {
        header('Cache-Control: public, max-age=604800');
        return view('admin.audition.index');
    }

    public function list()
    {
        header('Cache-Control: public, max-age=604800');
        $tests = Question::all();
        return view('admin.question.list', compact('tests'));
    }

    public function store(QuestionRequest $request)
    {
        $question = new Question();
        $question->question = $request['question'];
        $question->optionA = $request['optionA'];
        $question->optionB = $request['optionB'];
        $question->optionC = $request['optionC'];
        $question->correct_answer = $request['correct_answer'];
        $question->save();
        return redirect()->back()->with('status', 'Added');
    }

    public function edit(Question $question)
    {
        return view('admin.question.edit', compact('question'));
    }

   public function update(QuestionRequest $request, $questionId)
    {
    $question = Question::find($questionId);
    
    if (!$question) {
        abort(404); // or handle the case where the question is not found
    }
    
    $question->question = $request['question'];
    $question->optionA = $request['optionA'];
    $question->optionB = $request['optionB'];
    $question->optionC = $request['optionC'];
    $question->correct_answer = $request['correct_answer'];
    $question->save();
    
    return redirect(route('audition.list'))->with('status', 'Updated');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->with('status', 'Deleted');
    }


    public function testParticipant(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('participants'),
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ]
        ]);

        $participant = new Participant();
        $participant->email = $request->email;
        $participant->save();

        Notification::route('mail', [
            'oratoriogroup@gmail.com' => 'Alert! New participant has picked up the Handbook',
        ])->notify(new ParticipantEmailNotification($participant));


        Mail::to($participant->email)->send(new NewParticipantMail($participant));

        return redirect()->back()->with('status', 'Email verified! Check your email for the Oratorio handbook and Test link');
    }

    public function takeTest(Request $request)
    {
        header('Cache-Control: public, max-age=604800');
        $tests = Question::inRandomOrder()->get();
        $email = $request->query('email');
        return view('admin.audition.takeTest', compact('email', 'tests'));
    }


    public function submitTest(Request $request)
    {
        $request->validate([
            'participant' => ['required'],
            'phone' => ['required']
        ]);

        $answers = new Answer();
        $answers->participant = $request->input('participant');
        $answers->phone = $request->input('phone');
        $answers->chosenAnswer = json_encode($request->input('chosenAnswer'));
        $questions = collect($request->input('question'))->map(function ($question) {
            return str_replace('_', ' ', $question);
        })->toArray();
        $answers->question = implode(',', $questions);
        $answers->save(); 
        
        return redirect()->back()->with('status', 'Submitted Successfully! If you pass, you will get our mail. Interview Start within 7 Days from now');
    }


    public function finishTest(){
        header('Cache-Control: public, max-age=604800');
        return view('admin.audition.finishTest');
    }


    public function answeredTest()
    {
        $answers = Answer::all();
        return view('admin.question.answer', compact('answers'));
    }
}
