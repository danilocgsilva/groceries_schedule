<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\FirstCountDate;

class FirstCountDateRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\FirstCountDate $groceryItem
     * @return \Database\Repositories\FirstItemDateRepository
     */
    public function save($firstCountDate): static
    {
        $firstCountDate->save();
        return $this;
    }

    public function find(int $id): FirstCountDate
    {
        return FirstCountDate::find($id);
    }

    /**
     * @return array<\App\Models\FirstCountDate>
     */
    public function all(): array
    {
        /**
         * @var array<\App\Models\FirstCountDate>
         */
        $arrayOfFirstCountDate = [];
        foreach (FirstCountDate::all() as $item) {
            $arrayOfFirstCountDate[] = $item;
        }
        return $arrayOfFirstCountDate;
    }

    /**
     * @param \App\Models\FirstCountDate $entry
     * @return int
     */
    public function remove($firstCountDate): bool
    {
        $firstCountDate->delete();
        return true;
    }

    /**
     * @param \App\Models\FirstCountDate $entry
     * @return void
     */
    public function update($firstCountDate): void
    {
        $this->save($firstCountDate);
    }
}
