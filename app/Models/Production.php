<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'production_date',
        'stock_in',
        'final_quantity',
        'production_status',
    ];
}
