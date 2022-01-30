<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBankDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'number',
        'name',
        'contact'
    ];
}
