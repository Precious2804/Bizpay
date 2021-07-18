<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePlans extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'package',
        'value',
        'ref_bonus',
        'spons_bonus',
        'min_withdraw'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}