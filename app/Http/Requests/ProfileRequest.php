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
         $data =  [
            'title' => [
                'required',
                'string',
                'max:100',
            ],
            'desc' => [
                'required',
                'string',
                'max:300',
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),

            ],
            'comment_able' => [
                'nullable',
                Rule::in(['on', 'off', 1, 0]),
            ],
            'images' => [
                'required',
                'array',
                'min:1',
                'max:4',
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
                'max:300',
            ],
<<<<<<< HEAD
             
=======

>>>>>>> api
        ];
        if($this->isMethod('put')) {
            $data['images'] = [
                'nullable',
                'array',
                'min:1',
                'max:4',
            ];
        }
        return $data;
    }

}

