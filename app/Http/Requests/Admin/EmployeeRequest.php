<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'email' => 'required|unique:users,email,'.$this->employee->user->id,
            'name' => 'required',
            'japanese_name' => 'required',
            'birthday' => 'required',
            'prefecture' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
            'sex' => 'required',
            'contact_number' => 'required',
            'country' => 'required',
            'position_id' => 'required',
            'status' => 'required',
            
            'avatar' => [
                'file',
                'image',
                'mimes:jpeg,png',
                'max:1500',
            ]
        ];
    }
}
