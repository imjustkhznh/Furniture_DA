<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_huyen',
        'type',
        'matp',
    ];

    protected $primaryKey = 'maqh';

    protected $table = 'tbl_quanhuyen';
}
