<?php

namespace App\Http\Transformers;

use App\Models\Meta;
use Illuminate\Support\Facades\App;

class MetaTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param Meta $item
     * @return array
     */
    protected function transformItem($item): array
    {
        return [
            'title' => (string)$item->getTranslation('title', App::getLocale()),
            'description' => (string)$item->getTranslation('description', App::getLocale()),
            'keywords' => (string)$item->getTranslation('keywords', App::getLocale()),
            'slug' => (string)$item->slug,
        ];
    }


}
