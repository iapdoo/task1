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
            'image'=>'required_without:id|mimes:jpg,jpeg,png',
            'name_ar'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required'=>trans('product.requiredImage') ,
            'image.mimes'=>trans('product.imageMimes'),
            'name_ar.required'=>trans('product.nameAr'),
            'name_en.required'=>trans('product.nameEn'),
            'description_ar.required'=>trans('product.descriptionAr'),
            'description_en.required'=>trans('product.descriptionEn'),
        ];

    }
}
