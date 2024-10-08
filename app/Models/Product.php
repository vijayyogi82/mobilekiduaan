<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'mobile_id',
        'brand',
        'vender_id',
        'price',
        'price_sale',
        'mobile_type',
        'is_featured',
        'is_onsale',
        'memory_price',
        'memory_mrp',
        'category',
        'phone_offer',
        'is_deleted',
    ];

    public function mobile()
    {
        return $this->belongsTo(Mobile::class, 'mobile_id');
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class, 'mobile_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'vender_id');
    }
}