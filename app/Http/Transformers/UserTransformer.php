<?php

namespace App\Http\Transformers;

use App\Models\User;

class UserTransformer extends Transformer
{
    /**
     * Apply the transformer to a single item
     *
     * @param User $item
     * @return array
     */
    protected function transformItem($item): array
    {
        $result = [
            'id' => (int)$item->id,
            'name' => (string)$item->name,
            'email' => self::castNullable($item->email, 'string'),
            'email_verified_at' => self::castNullable($item->email_verified_at, 'string'),
            'role' => (string)$item->roles()->first()->name,
            'created_at' => (string)$item->created_at->toISOString(),
        ];

        return $result;
    }
}
