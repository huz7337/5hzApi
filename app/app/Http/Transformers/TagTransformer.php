<?php

namespace App\Http\Transformers;

use App\Models\Tag;

class TagTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Tag $item
     * @return array
     */
    protected function transformItem($item): array
    {
        return [
            'id' => (int)$item->id,
            'name' => (string)$item->name,
        ];
    }


}
