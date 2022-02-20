<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'section_name' => 'required|unique:sections|max:100',
            'description'=> 'required'
        ];
    }
    public function messages(){
        return[
            'section_name.required'=> 'this input mustn\'t be empty',
            'section_name.unique' => 'this section is already exists',
            'section_name.max' => 'this input must be less than 100 characters',
            'description.required'=> 'this input mustn\'t be empty'
        ];
    }
}
