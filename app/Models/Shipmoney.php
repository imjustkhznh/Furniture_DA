<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipmoney extends Model
{
    protected $fillable = [
        'matp',
        'maqh',
        'xaid',
        'ship_money',
    ];

    protected $primaryKey = 'feeID';

    protected $table = 'tbl_feeship';
}
