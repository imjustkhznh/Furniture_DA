<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'DiscountName',
        'DiscountCode',
        'DiscountType',
        'DiscountValue',
        'DiscountDescript',
        'DiscountStart',
        'DiscountEnd',
    ];

    protected $primatyKey = 'DiscountID';

    protected $table = 'tbl_discount';
}
