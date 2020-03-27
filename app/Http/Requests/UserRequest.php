<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstName' => 'required|alpha|min:2|max:20',
            'lastName' => 'required|alpha|min:2|max:20',
            'username' => 'required|regex:/^[a-z][a-z0-9\-\.\_]{2,20}$/|unique:users',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:7',
                'regex:/^[\w\W\D\d]{7,}$/'
            ],
            'roleId' => 'required|exists:roles,id'
        ];
    }
}
