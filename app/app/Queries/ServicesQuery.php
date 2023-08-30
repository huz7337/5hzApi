<?php

namespace App\Queries;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;

class ServicesQuery extends Query
{
    /**
     * Get query
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Service::query();

        // active
        $query->when(
            fn(Builder $q) => $q->where('active', true)
        );

        // search
        $query->when(
            $search = $this->getFilter('search'),
            fn(Builder $q) => $q->where('title', 'like', "%$search%")
        );

        return $query;
    }

}
