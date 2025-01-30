<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;

class PlaceRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\Place $place
     * @return \Database\Repositories\PlaceRepository
     */
    public function save(Model $place): static
    {
        $place->save();
        return $this;
    }

    public function find(int $id): Model
    {
        return Place::find($id);
    }

    /**
     * @return array<\App\Models\Purchase>
     */
    public function all(): array
    {
        /**
         * @var array<\App\Models\Purchase>
         */
        $arrayOfPlaces = [];
        foreach (Place::all() as $item) {
            $arrayOfPlaces[] = $item;
        }
        return $arrayOfPlaces;
    }

    /**
     * @inherit
     */
    public function remove(Model $entry): bool
    {

    }

    /**
     * @inherit
     */
    public function update(Model $entry): void
    {

    }
}
