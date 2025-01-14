<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model implements ModelInterface
{
    protected $table = 'groceries_items';

    private int $estimation;

    protected $fillable = [
        'name'
    ];

    public function estimation()
    {
        return $this->hasMany(EstimateLasting::class, "grocery_item_id", "id");
    }

    public function setEstimation(int $estimation): self
    {
        $this->estimation = $estimation;
        return $this;
    }

    public function getEstimation(): int|null
    {
        return $this->estimation ?? 
            (int) $this->estimation()->get()->first()->days ??
            null;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
