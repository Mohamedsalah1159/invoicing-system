<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'Product_name' => 'required|unique:products|max:100',
            'section_id'=> 'required'
        ];
    }
    public function messages(){
        return[
            'Product_name.required'=> 'this input mustn\'t be empty',
            'Product_name.unique' => 'this product is already exists',
            'Product_name.max' => 'this input must be less than 100 characters',
            'section_id.required'=> 'You Must Choose one of them'
        ];
    }
}
