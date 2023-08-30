<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(User::PERMISSION_BLOCK_UPDATE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:blocks,name,' . $this->route('block')->id],
            'description' => ['nullable', 'string'],
            'ids' => ['nullable', 'array'],
            'ids.*' => ['required', 'int'],
            'keys' => ['required', 'array'],
            'keys.*' => ['required', 'string'],
            'values' => ['required', 'array'],
            'values.*' => ['required', 'string'],
        ];
    }
}
