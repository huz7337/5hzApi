<?php

namespace App\Http\Transformers;
use App\Models\Service;

class ServiceTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Service $item
     * @return array
     */
    protected function transformItem($item): array
    {
        $result =  [
            'id' => (int)$item->id,
            'meta' => app(MetaTransformer::class)->transform($item->meta),
            'name' => (string)$item->name,
            'description' => (string)$item->description,
            'content' => (string)$item->content,
            'active' => (bool)$item->active,
            'attachment' => app(AttachmentTransformer::class)->transform($item->attachment)
        ];

        return $result;
    }
}
