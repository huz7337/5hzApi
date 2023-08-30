<?php

namespace App\Http\Requests;

use App\Queries\ServicesQuery;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListServicesRequest extends FormRequest
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
            'search' => ['string', 'min:3'],
            'sort_column' => ['string', Rule::in(array_keys(ServicesQuery::$sort))],
            'sort_direction' => ['string', Rule::in('asc', 'desc')],
        ];
    }
}
