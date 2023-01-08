<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'logo'=>'required_without:id|mimes:jpg,jpeg,png',
            'name_ar'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'logo.required'=>trans('partner.requiredImage') ,
            'logo.mimes'=>trans('partner.imageMimes'),
            'name_ar.required'=>trans('partner.nameAr'),
            'name_en.required'=>trans('partner.nameEn'),
            'description_ar.required'=>trans('partner.descriptionAr'),
            'description_en.required'=>trans('partner.descriptionEn'),
        ];

    }
}
