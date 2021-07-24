<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'trans_id',
        'email',
        'coupone_code',
        'package',
        'trans_type',
        'amount',
        'status'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
