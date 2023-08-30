<?php

namespace App\Http\Requests;

use App\Queries\PostsQuery;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListPostsRequest extends FormRequest
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
            'page' => ['sometimes', 'integer', 'min:1'],
            'per_page' => ['sometimes', 'integer', 'min:1', 'max:100'],
            'search' => ['nullable', 'string'],
            'sort_column' => ['string', Rule::in(array_keys(PostsQuery::$sort))],
            'sort_direction' => ['string', Rule::in('asc', 'desc')],
            'category_id' => ['nullable', 'integer', Rule::exists('categories', 'id')]
        ];
    }
}
