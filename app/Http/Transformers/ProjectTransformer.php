<?php

namespace App\Http\Transformers;
use App\Models\Project;

class ProjectTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Project $item
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
