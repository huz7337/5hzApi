<?php

namespace App\Http\Transformers;

use App\Models\Field;
use Illuminate\Support\Facades\App;

class FieldsTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Field $item
     * @return array
     */
    protected function transformItem($item): array
    {
        return [
            "id" => (int)$item->id,
            "key" => (string)$item->key,
            "value" => (string)$item->getTranslation('value', App::getLocale()),
        ];
    }


}
