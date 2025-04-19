<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
 

    public function rules(): array
    { 
        return [
            'title' => [
                'required',
                'string',
                'max:100',
                Rule::unique('posts', 'title')->ignore(auth()->user()->id),
            ],
            'desc' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'desc')->ignore(auth()->user()->id),
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
              
            ],
            'comment_able' => [
                'nullable',
                Rule::in(['on', 'off']),
            ],
            'images' => [
                'required',
                'array',
                'min:1',
                'max:3',
            ],
            'images.*' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:3072',  
            ],
            'smail_desc' => [ 
                'required',
                'string',
                'max:255',
            ],
        ];
    }
    
}

