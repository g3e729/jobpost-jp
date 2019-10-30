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

        dd(__method__);
    }

    private function employee($step)
    {
        $rules = [
            1 => [
                'name' => 'required',
                'japanese_name' => 'required',
                'password' => 'required|confirmed',
                'birthday' => 'required',
                'prefecture' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'address3' => 'required',
                'sex' => 'required',
                'contact_number' => 'required'
            ],
            2 => [
                'country' => 'required',
                'position_id' => 'required',
                'status' => 'required'
            ],
        ];

        return $rules[$step] ?? [];
    }

    private function student($step)
    {

        dd(__method__);
    }
}
