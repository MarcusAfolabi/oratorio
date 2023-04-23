<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
     
    public function authorize(): bool
    {
        return true;
    }

     
    public function rules(): array
    {
        
        return [
            'title' => ['required','string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'employment_type' => ['required', 'string', 'max:255'],
            'start_date' => ['sometimes', 'date'],
            'end_date' => ['sometimes', 'date', 'after_or_equal:start_date'],
            'work_description' => ['sometimes', 'string', 'max:255'],
            'current_work' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
