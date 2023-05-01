<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'optionA' => ['required', 'string'],
            'optionB' => ['required', 'string'],
            'optionC' => ['required', 'string'],
            'correctAnswer' => ['required', 'string'],
            
        ];
    }
}
