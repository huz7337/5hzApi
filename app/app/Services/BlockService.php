<?php

namespace App\Services;

use App\Models\Block;
use Illuminate\Support\Facades\App;

class BlockService
{

    /**
     * Add a new block
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Block
    {
        $block = Block::create($data);

        return $block;
    }

    /**
     * Update block
     * @param Block $block
     * @param array $data
     * @return Block
     */
    public function update(Block $block, array $data): Block
    {
        $block->update($data);

        foreach ($data['keys'] as $index => $key) {

            var_dump( [
                'id' => $data['ids'][$index] ?? null,
                'key' => $key,
                'value' => [App::getLocale() => $data['values'][$index]],
            ]);
//            $block->fields()->updateOrCreate(
//                [
//                    'id' => $data['ids'][$index] ?? null,
//                    'key' => $key,
//                    'value' => [App::getLocale() => $data['values'][$index]],
//                ]
//            );
        }

        dd();

        return $block;
    }
}
