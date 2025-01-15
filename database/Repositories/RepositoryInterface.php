<?php

declare(strict_types=1);

namespace Database\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelInterface;

interface RepositoryInterface
{
    /**
     * @param ModelInterface $entry
     * @return void
     */
    public function save($entry);

    public function find(int $id): Model;

    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param Model $entry
     * @return int
     */
    public function remove($entry): bool;

    /**
     * @param Model $entry
     * @return int
     */
    public function update($entry): void;
}
