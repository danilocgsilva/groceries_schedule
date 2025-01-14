<?php

declare(strict_types=1);

namespace Database\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelInterface;

interface RepositoryInterface
{
    public function save(ModelInterface $entry);

    public function find(int $id): Model;
}
