<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model implements ModelInterface
{
    protected $table = "groceries_items";

    private int|null $estimation = null;

    protected $fillable = [
        "name"
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
        if ($this->estimation) {
            return $this->estimation;
        }
        if ($estimation = $this->estimation()->get()->first()) {
            return ($this->estimation = (int) $estimation->days);
        }
        return null;
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
