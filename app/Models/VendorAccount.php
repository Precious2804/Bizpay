<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'phone',
        'image'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
