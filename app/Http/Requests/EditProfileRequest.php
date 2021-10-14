<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'image' => 'image',
            'birthdate' => 'required|date_format:Y-m-d',
            'school' => 'required|max:60',
            'address' => 'required|max:60',
            'gendar' => 'required|bool'
        ];
    }
}
