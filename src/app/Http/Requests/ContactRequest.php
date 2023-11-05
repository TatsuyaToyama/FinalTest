<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:122'],
            'first_name' => ['required', 'string', 'max:122'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'postcode' => ['required', 'size:8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['max:255'],
            'opinion' => ['required', 'string', 'max:120'],
        ];
    }


    public function messages(){

    return [
            'last_name.required' => '名字を入力してください',
            'last_name.string' => '名字を文字列で入力してください',
            'last_name.max' => '名字を122文字以下で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を122文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.size' => '郵便番号を8文字で入力してください',
            
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building_name.max' => '建物名を255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以下で入力してください',    
        ];

    }

}
