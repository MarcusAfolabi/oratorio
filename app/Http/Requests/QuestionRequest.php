<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'question' => ['required', 'string'],
            'optionA' => ['required', 'string'],
            'optionB' => ['required', 'string'],
            'optionC' => ['required', 'string'],
            'correct_answer' => ['required', 'string'],
            
        ];
    }
}
