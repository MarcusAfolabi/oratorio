<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $fillable = ['question', 'participant', 'chosenAnswer'];

    public function getQuestion($question)
{
    $quiz = Question::where('question', $question)->first();

    if ($quiz) {
        return $quiz->question;
    } else {
        return 'Unknown question';
    }
}

}
