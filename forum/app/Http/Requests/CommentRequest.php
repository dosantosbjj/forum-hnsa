<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'string | required | min:20',
            'author_id' => 'required | integer',
            'post_id' => 'required | integer',
            'comment_date' => 'required | date' 
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'É obrigatório informar o comentário...',
        ];

    }
}
