<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingCylinderRequest extends FormRequest
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
            'supplier' => 'required',
            'name' => "required|max:25|regex:/^([a-zA-Z ']*)$/",
            'email' => 'required|unique:users,email',
            'covid_19' => 'required|in:positive,negative',
            'date_covid_19' => 'required',
            'phonenumber' => 'required|max:16|min:10',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|digits_between:1,3',
            'address' => "required|max:255|regex:/^([a-zA-Z0-9 ']*)$/",
            'state' => 'required',
            'city' => 'required',
            'aadhar_card' => 'required|digits:12',
            'identity_proof' => 'required|mimes:jpeg,jpg,png,gif',
            'cylinder' => 'required',

        ];
    }

    public function message()
    {
        return [
            'name.required' => "Name field is required",
            'name.regex' => "Name field in wrong way",

            'email.required' => 'Email field is required',
            'email.unique' => "Please enter email field is unique",

            'covid_19.required'=> "Covid 19 field is required",
            'covid_19.in'=>"Covid 19 field Select incorrect",

            'date_covid_19.required'=> "Date of Covid 19 field is required",
            'gender.required' => "Gender field is required",
            'gender.in' => "Gender field is must male,female,other",
            'age.required' => "Age field is required",
            
            
            'phonenumber.required'=> 'Phone Number field is required',
            'phonenumber.max'=> 'Phone Number field not maximum to 16',

            'address.required' => "Address field is required",
            'state.required' => "State field is required",
            'city.required' => "City field is required",
            'aadhar_card.required' => "Aadhar Card Nummber field is required",

            'identity_proof.required' => 'Identity_proof field is required',
            'identity_proof.mimes' => 'Identity_proof field is must in png,jpeg,jpg,gif',
            'cylinder.required' => 'Cylinder field is required',
           

        ];
    }
}
