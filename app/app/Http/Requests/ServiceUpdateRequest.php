<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can(User::PERMISSION_SERVICE_UPDATE);
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
            'attachment' => ['nullable', 'file', 'mimes:jpeg,jpg,png,webp,svg', 'max:250000'],
            'meta.title' => ['required', 'string'],
            'meta.description' => ['required', 'string'],
            'meta.keywords' => ['required', 'string'],
            'meta.slug' => ['nullable', 'string'],
        ];
    }
}
