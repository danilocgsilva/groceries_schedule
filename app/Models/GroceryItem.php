<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GroceryItem extends Model implements ModelInterface
{
    protected $table = "groceries_items";

    private int|null $estimation = null;

    private EstimateLasting $estimateLasting;

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
        if ($estimation = $this->estimation()->get()->last()) {
            $this->estimateLasting = $estimation;
            return ($this->estimation = (int) $estimation->days);
        }
        return null;
    }

    public function getObjectEstimation(): EstimateLasting
    {
        return $this->estimateLasting ?? 
            ($this->estimateLasting = $this->estimation()->get()->last());
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

    public function firstCountDate(): HasOne
    {
        return $this->hasOne(FirstCountDate::class, "grocery_item_id", "id");
    }
}
