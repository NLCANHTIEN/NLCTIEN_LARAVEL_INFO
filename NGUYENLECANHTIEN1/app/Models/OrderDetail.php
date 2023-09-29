<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'product_id',
        'parent_id',
        'price',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at'

    ];
}
