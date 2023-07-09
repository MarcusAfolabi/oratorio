<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
     
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
                'content' => ['required', 'string', 'max:2000', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate|fuck|fuckup|mad|bastard).*$/i'],
                'title' => ['nullable', 'string', 'max:100'],
                'category_id' => ['required', 'string', 'max:250'],
                "image" => ['sometimes', 'array', 'max:4'],
                "image*" => ['sometimes', 'file', 'mimes:jpeg,png,jpg,mp3,mp4', 'max:20125'],
        ];
    }
}
