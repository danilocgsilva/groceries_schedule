<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

interface ModelInterface
{
    public function save(array $options = []);
}