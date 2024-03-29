<?php

namespace App\Http\Requests;

use App\Models\Invitation;
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
        $type = Invitation::getTypes($this->get('type'));

        return $this->$type($this->get('step'));
    }

    private function company($step)
    {
        $rules = [
            1 => [
                'company_name'        => 'required',
                // 'password' => 'required|confirmed',
                'prefecture'          => 'required',
                'address1'            => 'required',
                'address2'            => 'required',
                'address3'            => 'required',
                'ceo'                 => 'required',
                'number_of_employees' => '',

                'description'      => 'required',
                'industry_id'      => 'required',
                'established_date' => 'required',
                'homepage'         => '',

                'avatar' => [
                    'file',
                    'image',
                    'mimes:jpeg,png',
                    'max:1500',
                ],

                'cover_photo' => [
                    'file',
                    'image',
                    'mimes:jpeg,png',
                    'max:1500',
                ]
            ],
            2 => [
                'password' => 'required|confirmed',
                // 'contact_number' => 'required',
            ],
        ];

        return $rules[$step] ?? [];
    }

    private function employee($step)
    {
        $rules = [
            1 => [
                'name'           => 'required',
                'japanese_name'  => 'required',
                // 'password' => 'required|confirmed',
                'birthday'       => 'required',
                'prefecture'     => 'required',
                'address1'       => 'required',
                'address2'       => 'required',
                'address3'       => 'required',
                'sex'            => 'required',
                'contact_number' => 'required',

                'country'     => 'required',
                'position_id' => 'required',
                'status'      => 'required',
            ],
            2 => [
                'password' => 'required|confirmed',

                'avatar' => [
                    'file',
                    'image',
                    'mimes:jpeg,png',
                    'max:1500',
                ],
            ],
        ];

        return $rules[$step] ?? [];
    }

    private function student($step)
    {
        $rules = [
            1 => [
                'name'           => 'required',
                'japanese_name'  => 'required',
                // 'password' => 'required|confirmed',
                'birthday'       => 'required',
                'prefecture'     => 'required',
                'address1'       => 'required',
                'address2'       => 'required',
                'address3'       => 'required',
                'sex'            => 'required',
                'contact_number' => 'required',

                'enrollment_date' => 'required',
                'graduation_date' => 'required',
                'occupation'      => 'required',
            ],
            2 => [
                'password' => 'required|confirmed',

                'avatar' => [
                    'file',
                    'image',
                    'mimes:jpeg,png',
                    'max:1500',
                ],
            ],
        ];

        return $rules[$step] ?? [];
    }
}
