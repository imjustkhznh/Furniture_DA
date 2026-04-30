<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcribe extends Model
{
    use HasFactory;

    protected $fillable = [
        'SubcribeEmail',
        'SubcribeDate',
        'SubcribeStatus',
    ];

    protected $primaryKey = 'SubcribeID';

    protected $table = 'tbl_subcribe';
}
