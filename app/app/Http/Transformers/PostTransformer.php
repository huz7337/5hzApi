<?php

namespace App\Http\Transformers;

use App\Models\Post;

class PostTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Post $item
     * @return array
     */
    protected function transformItem($item): array
    {
        $result = [
            'id' => (int)$item->id,
            'meta' => app(MetaTransformer::class)->transform($item->meta),
            'description' => (string)$item->description,
            'content' => (string)$item->content,
            'is_comments' => (bool)$item->is_comments,
            'active' => (bool)$item->active,
            'category_id' => (int)$item->category_id,
            'category' => app(CategoryTransformer::class)->transform($item->category),
            'tags' => app(TagTransformer::class)->transform($item->tags),
            'attachment' => app(AttachmentTransformer::class)->transform($item->attachment),
            'views' => $item->views ? $item->views->views_count : 0
        ];

        return $result;
    }
}
