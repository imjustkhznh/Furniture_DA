<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'ContactName',
        'ContactEmail',
        'ContactSubject',
        'ContactMessage',
    ];

    protected $primaryKey = 'ContactID';

    protected $table = 'tbl_contact';
}
