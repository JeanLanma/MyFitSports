<?php

namespace App\Models\Admin\Erp\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'fiscal_name',
        'trade_name',
        'responsible_contact',
        'phone',
        'mail',
        'web_url',
        'payment_method', // credito, transferencia, efectivo
        'credit_days', // Default: N/A
        'application_type', // Default: N/A
        'seal_type' // Default: N/A
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
