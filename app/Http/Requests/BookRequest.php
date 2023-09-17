<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required|max:150|alpha',
            'authorname'=>'required|min:4',
            'description'=>'required',
            'publisher'=>'required',
            'publishyear'=>'required',
            'qty'=>'required',
            'price'=>'required'
        ];
    }

    public function messages(){

        // 'name.required'=>"please enter your name",
        // 'name.max' =>"The name should not be longer than 10 letters",
        // 'email.required'=>"please enter your email",
        // 'email.email'=>"Invalid email"
    }
}
