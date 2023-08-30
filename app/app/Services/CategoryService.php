<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{

    /**
     * Add a new tag
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Category
    {
        $category = Category::create($data);

        return $category;
    }

    /**
     * Update tag
     * @param Category $category
     * @param array $data
     * @return Category
     */
    public function update(Category $category, array $data): Category
    {
        $category->update($data);

        return $category;
    }
}
