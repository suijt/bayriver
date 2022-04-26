<?php

namespace App\Http\Requests\Front\ApplyNow;

use Illuminate\Foundation\Http\FormRequest;

class ApplyNowRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'first_name.required'=>'First name is needed',
            'last_name.required'=>'Last name is  needed',
            'email'=>'email is needed',
        ];
    }
}
