<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequests extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'loan_coupone',
        'email',
        'fname',
        'lname',
        'phone',
        'duration',
        'amount',
        'reasons',
        'document',
        'status'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
