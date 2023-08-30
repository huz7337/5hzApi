<?php

namespace App\Services;

use App\Models\Position;

class PositionService
{

    /**
     * Add a new position
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Position
    {
        return Position::create($data);
    }

    /**
     * Update position
     * @param Position $position
     * @param array $data
     * @return Position
     */
    public function update(Position $position, array $data): Position
    {
        $position->update($data);

        return $position;
    }
}
