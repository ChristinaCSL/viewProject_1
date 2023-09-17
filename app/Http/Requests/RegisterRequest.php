<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [ 
            //
            'name'=>'required|max:10|alpha',
            'phone'=>'required|min:11|numeric',
            'address'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required'=>"please enter your name",
            'name.max' =>"The name should not be longer than 10 letters",
            'email.required'=>"please enter your email",
            'email.email'=>"Invalid email"
        ];
    }
}
