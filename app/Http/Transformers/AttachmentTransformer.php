<?php

namespace App\Http\Transformers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Attachment $item
     * @return array
     */
    protected function transformItem($item): array
    {
        return [
            'id' => (int)$item->id,
            'path' => Storage::disk('public')->url($item->path),
        ];
    }


}
