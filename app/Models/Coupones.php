<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupones extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'coupone_code',
        'user_email',
        'package',
        'amount',
        'profit',
        'status',
        'expire_at'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
