<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * If a grocery item is created, but no purchase was been done yet, the application
 * should not have a way to calculate the next purchase. The FirstCount is a way to
 * register the initial date from by where the application must calculates the groceries
 * needs.
 */
class FirstCount extends Model
{
    protected $table = "first_count_date";
}
