<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'bail|required|string',
            'email'=>'bail|required|email|unique:users',
            'phone'=>'bail|required|unique:users',
            'education'=>'bail|required',
            'password'=>['bail','required','string','confirmed',Password::min(4)->mixedCase()],
        ];
    }
}
