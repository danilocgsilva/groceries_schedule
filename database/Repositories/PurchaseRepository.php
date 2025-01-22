<?php

declare(strict_types=1);

namespace Database\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class PurchaseRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\Purchase $purchase
     * @return \Database\Repositories\PurchaseRepository
     */
    public function save(Model $purchase): static
    {
        return $this;
    }

    public function find(int $id): Model;

    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param Model $entry
     * @return int
     */
    public function remove(Model $entry): bool;

    /**
     * @param Model $entry
     * @return int
     */
    public function update(Model $entry): void;
}
