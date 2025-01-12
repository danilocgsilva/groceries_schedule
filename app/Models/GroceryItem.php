<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    protected $table = 'groceries_itens';

    protected $fillable = [
        'name'
    ];
}
