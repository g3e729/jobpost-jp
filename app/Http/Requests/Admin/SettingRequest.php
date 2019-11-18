<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $data = [];

        switch ($this->get('type')) {
            case 'avatar':
                $data = [
                    'avatar' => [
                        'required',
                        'file',
                        'image',
                        'mimes:jpeg,png',
                        'max:1500',
                    ],
                ];
            break;
            case 'password':
                $data = [
                    'password' => 'required|confirmed',
                ];
            break;
        }

        return $data;
    }
}
