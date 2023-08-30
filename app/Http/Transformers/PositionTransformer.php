<?php

namespace App\Http\Transformers;

use App\Models\Position;

class PositionTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Position $item
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
