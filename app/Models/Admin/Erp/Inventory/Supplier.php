<?php

namespace App\Models\Admin\Erp\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'company_reason',
        'company_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'payment_method',
        'credit_days',
        'request_type',
        'stamp_type',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
