<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCodes extends Model
{
    use HasFactory;

    protected $fillbale = [
        'codes',
        'bank_name'
    ];
}
