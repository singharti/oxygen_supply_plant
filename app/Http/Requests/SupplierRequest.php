<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|max:25|regex:/^([a-zA-Z ']*)$/",
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password',
            'phonenumber' => 'required|max:16|min:10',
            'gender' => 'required|in:male,female,other',
            'age' => 'required',
            'address' => "required|max:255|regex:/^([a-zA-Z0-9 ']*)$/",
            'state' => 'required',
            'city' => 'required',
            'aadhar_card' => 'required',
            'identity_proof' => 'required|mimes:jpeg,jpg,png,gif',



        ];
    }

    public function message()
    {
        return [
            'name.required' => "Name field is required",
            'address.required' => "Address field is required",
            'email.required' => 'Email field is required',
            'email.unique' => "Please enter email field is unique",
            // 'contact.required'=> 'Contact field is required',
            // 'username.required'=> "Username field is required",
            // 'username.regex'=>"Not a valid formate for username",
            // 'username.unique'=> "Please enter Username field is unique",
            'password.required' => 'Password field is required',
            'confirm_password.required_with' => 'Confirm Password field is required'

        ];
    }
}
