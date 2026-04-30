<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'SlideName',
        'SlideTitle',
        'SlideContent',
        'SlideImage',
        'SlideStatus',
    ];

    protected $primaryKey = 'SlideID';

    protected $table = 'tbl_slide';
}
