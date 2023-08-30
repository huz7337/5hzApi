<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can(User::PERMISSION_PROJECT_CREATE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'content' => ['required'],
            'active' => ['nullable', 'boolean'],
            'attachment' => ['nullable', 'file', 'mimes:jpeg,jpg,png,webp', 'max:250000'],
            'meta.title' => ['required', 'string'],
            'meta.description' => ['required', 'string'],
            'meta.keywords' => ['required', 'string'],
            'meta.slug' => ['nullable', 'string'],
        ];
    }

    /**
     * Get the custom messages in case of errors
     *
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'meta.title' => __('The title field is required.'),
            'meta.description' => __('The description field is required.'),
            'meta.keywords' => __('The keywords field is required.'),
            'meta.slug' => __('The slug field is required.'),
        ];
    }
}
