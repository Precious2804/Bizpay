<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefWithdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'ref_id',
        'email',
        'phone',
        'bonus_amount',
        'status'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
