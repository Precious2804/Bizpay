<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnUsedCoupones extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'coupone_code',
        'status'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
