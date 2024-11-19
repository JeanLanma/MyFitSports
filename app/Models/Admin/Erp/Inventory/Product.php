<?php

namespace App\Models\Admin\Erp\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'stock',
        'costs',
        'price',
        'status',
        'unit',
        'supplier',
        'physical_inventory',
    ];
}
