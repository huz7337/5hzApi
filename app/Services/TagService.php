<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{

    /**
     * Add a new tag
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Tag
    {
        $tag = Tag::create(['name' => $data['name']]);

        return $tag;
    }

    /**
     * Update tag
     * @param Tag $tag
     * @param array $data
     * @return Tag
     */
    public function update(Tag $tag, array $data): Tag
    {
        $tag->update($data);

        return $tag;
    }
}
