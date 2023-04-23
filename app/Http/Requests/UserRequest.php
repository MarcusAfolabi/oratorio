<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => ['sometimes','string','max:255'],
            'last_name' => ['sometimes','string','max:255'],
            'middle_name' => ['sometimes','string','max:255'],
            'date_of_birth' => ['sometimes','string', 'date'],
            'gender' => ['sometimes','string'],
            'email' => ['sometimes','email'],
            'city' => ['sometimes','string','max:255'],
            'country' => ['sometimes','string','max:255'],
            'community_id' => ['sometimes','integer'],
            'industry_id' => ['sometimes','integer'],
            'work_experience' => ['sometimes','string', 'max:20'],
            'linkedin_profile' => ['sometimes','url'],
            'phone' => ['sometimes','string','max:14'],  
            'whatsapp' => ['sometimes','string','max:14'],
            'profile_id' => ['sometimes','string'],
            'biography' => ['sometimes','string', 'max:1000'],
            'profile_photo_url' => ['sometimes', 'mimes:jpg,jpeg,png', 'max:1024'],

        ];
    }
}
