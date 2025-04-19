<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
 
class SetingUserRequest extends FormRequest
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
            'name' => ['required','string','max:255',Rule::unique('users','name')->ignore(auth()->user()->id)],
            'email' => ['required','email','max:255',Rule::unique('users','email')->ignore(auth()->user()->id)],
            'username' => ['required','string','max:255',Rule::unique('users','username')->ignore(auth()->user()->id)],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'password' => ['required','string','min:8'],
        ];
    }
}
