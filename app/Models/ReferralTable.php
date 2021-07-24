<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_id',
        'referrer',
        'refered',
        'ref_id'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
