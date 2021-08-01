<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessages extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_id',
        'name',
        'email',
        'subject',
        'message'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
