<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 'email', 'saying', 'price', 'status', 'payment_id',
    ];
}