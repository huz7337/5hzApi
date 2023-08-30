<?php

namespace App\Http\Transformers;

use App\Models\Category;

class CategoryTransformer extends Transformer
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
        ];
    }


}
