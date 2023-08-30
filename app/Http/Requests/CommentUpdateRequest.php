<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(User::PERMISSION_COMMENT_UPDATE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'commentable_id' => ['integer', Rule::exists('posts', 'id')],
            'comment' => ['required'],
            'attachments' => ['nullable', 'array'],
            'attachments.file.*' => ['required', 'file', 'mimes:jpeg,jpg,png', 'max:250000'],
            'is_approved' => ['nullable', 'boolean']
        ];
    }
}
