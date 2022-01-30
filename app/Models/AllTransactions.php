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
        'trans_type',
        'amount',
        'status',
        'duration',
        'days_left',
        'profit'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
