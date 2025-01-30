<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\ModelInterface;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @param ModelInterface $entry
     * @return self
     */
    public function save(Model $entry): static;

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
