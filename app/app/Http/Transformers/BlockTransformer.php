<?php

namespace App\Http\Transformers;

use App\Models\Category;
use App\Models\Field;

class BlockTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Category $item
     * @return array
     */
    protected function transformItem($item): array
    {
        return [
            'id' => (int)$item->id,
            'name' => (string)$item->name,
            'description' => (string)$item->description,
            'fields' => app(FieldsTransformer::class)->transform($item->fields)
        ];
    }


}
