<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules=[
            'name' => 'required|string|min:5',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            // 'image' => 'required|image',

        ];
        if($this->route()->getActionMethod()==='store'){
            $rules['image']='required|image';
        }
        return $rules;
    }
}
