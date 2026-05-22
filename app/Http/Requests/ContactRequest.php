<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'first_name' => 'required|string|max:8',
            'last_name' => 'required|string|max:8',
            'gender' => 'required',
            'email' => 'required|email',
            'tel' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }
   public function messages(): array
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.numeric' => '電話番号は数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }

}
