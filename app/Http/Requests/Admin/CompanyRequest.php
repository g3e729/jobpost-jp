<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        switch ($this->get('step')) {
            case 1:
                $url_regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

                return [
                    'company_name'        => 'required',
                    // 'password' => 'required|confirmed',
                    'prefecture'          => 'required',
                    'address1'            => 'required',
                    'address2'            => 'required',
                    'address3'            => 'required',
                    'ceo'                 => 'required',
                    'number_of_employees' => '',
                    // 'contact_number' => 'required',

                    'description'      => 'required',
                    'industry_id'      => 'required',
                    'homepage'         => '',
                    'established_date' => 'required',

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
                    ],

                    "social_media.facebook"  => $this->facebook ? 'regex:' . $url_regex : '',
                    "social_media.twitter"   => $this->twitter ? 'regex:' . $url_regex : '',
                    "social_media.instagram" => $this->instagram ? 'regex:' . $url_regex : '',
                ];
                break;
            case 2:
                return [
                    'portfolios.*.file' => [
                        'file',
                        'image',
                        'mimes:jpeg,png',
                        'max:1500',
                    ]
                ];
                break;
        }

        return [];
    }
}
