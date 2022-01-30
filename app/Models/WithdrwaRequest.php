<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrwaRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'email',
        'phone',
        'amount',
        'profit',
        'status'
    ];
}
