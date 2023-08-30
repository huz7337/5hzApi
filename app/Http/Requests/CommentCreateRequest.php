<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can(User::PERMISSION_COMMENT_CREATE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment' => ['required','max:100'],
            'post_id' => ['required_without:page_id', 'nullable', Rule::exists('posts', 'id')],
            'page_id' => ['required_without:post_id', 'nullable', Rule::exists('pages', 'id')],
            'attachments' => ['nullable', 'array'],
            'attachments.file.*' => ['required', 'file', 'mimes:jpeg,jpg,png', 'max:250000']

        ];
    }
}
