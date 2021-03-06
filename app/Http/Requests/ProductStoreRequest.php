<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
           'name'  => 'required|string',
           'price' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Fill Name',
            'name.string' => 'Please Fill Valid Name',
            'price.required' => 'Please Fill Price',
            'price.numeric' => 'Please Fill Valid Price'
        ];
    }
}
