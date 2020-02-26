<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'body' => 'required',
            'url' => [
                'required',
                'max:50',
                Rule::unique('articles')->ignore($this->article)
            ],
            'release_date' => 'required|date',
        ];
    }

    /**
     * エラーメッセージを変更
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'title' => [

            ]
        ];
    }
}
