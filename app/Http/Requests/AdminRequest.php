<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'email'=>'required|unique:admins,email,'.$this->id,
            'password'=>'required_without:id',
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required'=>'الاسم مطلوب',
            'name_en.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم يجب ان يكون احرف',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'البريد الالكتروني غير صالح',
            'password.required'=>'كلمه المرور مطلوبه',
            'password.min'=>'كلمه المرور يجب الا تقل عن 6 احرف ',
            ];
    }
}
