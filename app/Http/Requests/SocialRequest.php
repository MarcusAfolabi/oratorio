<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
 
    public function rules(): array
    {
        return [
            'twitter' => ['sometimes','url','max:255'],
            'youtube' => ['sometimes','url','max:255'],
            'github' => ['sometimes','url','max:255'],
            'website' => ['sometimes','url','max:255'],
            'instagram' => ['sometimes','url','max:255'],

        ];
    }
}
