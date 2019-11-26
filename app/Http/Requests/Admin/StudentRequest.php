<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $url_regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        switch ($this->get('step')) {
            case 1:
                return [
                    'japanese_name' => 'required',
                    'name' => 'required',
                    'birthday' => 'required',
                    'prefecture' => 'required',
                    'address1' => 'required',
                    'address2' => 'required',
                    'address3' => 'required',
                    'sex' => 'required',
                    'contact_number' => 'required',
                    'email' => 'required|email',
                    'enrollment_date' => 'required',
                    'graduation_date' => 'required',
                    'occupation_id' => 'required',
                    'description' => 'required',

                    "social_media.facebook" => $this->facebook ? 'regex:' . $url_regex : '',
                    "social_media.twitter" => $this->twitter ? 'regex:' . $url_regex : '',
                    "social_media.instagram" => $this->instagram ? 'regex:' . $url_regex : '',
                ];
            break;
            case 2:
                return [
                    // 'intro_text' => 'required',
                    // 'what_text' => 'required',

                    // 'work_history.*.company_name' => 'required',
                    // 'work_history.*.role' => 'required',
                    // 'work_history.*.content' => 'required',

                    // 'education_history.*.school_name' => 'required',
                    // 'education_history.*.faculty' => 'required',
                    // 'education_history.*.major' => 'required',
                    // 'education_history.*.department' => 'required',
                    // 'education_history.*.content' => 'required',

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

                    'movie' => $this->movie ? 'regex:' . $url_regex : '',
                ];
            break;
            case 3:
                return [
                    // 'portfolios.*.title' => 'required',
                    // 'portfolios.*.description' => 'required',
                    // 'portfolios.*.url' => 'required','',
                ];
            break;
        }

        return [];
    }
}
