<?php

namespace App\Queries;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

class PostsQuery extends Query
{
    /**
     * Available sort options
     * @var array|string[]
     */
    public static array $sort = [
        'id' => 'id',
        'created_at' => 'created_at'
    ];

    /**
     * Get query
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Post::query();

        // active
        $query->when(
            fn(Builder $q) => $q->where('active', true)
        );

        // category_id
        $query->when(
            $category_id = $this->getFilter('category_id'),
            fn(Builder $q) => $q->where('category_id', $category_id)
        );

        // search
        $query->when(
            $search = $this->getFilter('search'),
            fn(Builder $q) => $q->whereHas(
                'meta',
                function (Builder $q) use ($search) {
                    $locale = App::getLocale();
                    $q->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.$locale'))) LIKE ?", [strtolower("%$search%")])
                        ->orWhereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(description, '$.$locale'))) LIKE ?", [strtolower("%$search%")]);
                }
            )->orWhere(function ($q) use ($search) {
                $locale = App::getLocale();
                $q->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(content, '$.$locale'))) LIKE ?", [strtolower("%$search%")]);
            })
        );


        // categories
        $query->when(
            $categories = $this->getFilter('categories'),
            fn(Builder $q) => $q->whereIn('category_id', explode(',', $categories))
        );

        // tags
        $query->when(
            $tags = $this->getFilter('tags'),
            fn(Builder $q) => $q->whereHas(
                'tags',
                fn(Builder $q) => $q->whereIn('tag_id', explode(',', $tags))
            )
        );

        $sort = $this->getSorting();
        $query->orderBy(...$sort);

        return $query;
    }

}
