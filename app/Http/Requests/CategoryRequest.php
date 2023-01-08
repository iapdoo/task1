<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'image'=>'required_without:id|image',
            'name_ar'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required'=>trans('category.requiredImage') ,
            'image.mimes'=>trans('category.imageMimes'),
            'name_ar.required'=>trans('category.nameAr'),
            'name_en.required'=>trans('category.nameEn'),
            'description_ar.required'=>trans('category.descriptionAr'),
            'description_en.required'=>trans('category.descriptionEn'),
            ];

    }
}
