<?php

namespace App\Http\Requests;

use App\Models\Invitation;
use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
            'title'       => 'required',
            'description' => 'required',

            'position'             => 'required',
            'programming_language' => 'required',
            'framework'            => 'required',
            'environment'          => 'required',
            'database'             => 'required',
            'requirements'         => 'required',
            'employment_type'      => 'required',
            'number_of_applicants' => 'required',
            'work_time'            => 'required',
            'salary'               => 'required',
            'holidays'             => 'required',
            'allowance'            => 'required',
            'incentive'            => 'required',
            'salary_increase'      => 'required',
            'insurance'            => 'required',
            'contract_period'      => 'required',
            'screening_flow'       => 'required',

            'prefecture'   => 'required',
            'address1'     => 'required',
            'address2'     => 'required',
            'address3'     => 'required',
            'city'         => '',
            'country'      => '',
            'station'      => '',
            'published_at' => '',

            'cover_photo' => 'max:3000'
        ];
    }
}
