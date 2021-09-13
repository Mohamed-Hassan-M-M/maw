<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role_id' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $admin = $this->route()->parameter('admin');

            $rules['email'] = 'required|email|unique:users,id,' . $admin->id;
            $rules['password'] = '';

        }//end of if

        return $rules;

    }//end of rules

    public function attributes()
    {
        return [
            'role_id' => __('roles.role')
        ];

    }// end of messages

}//end of request
