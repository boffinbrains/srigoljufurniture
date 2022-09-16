<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    use HasFactory;
    protected $fillable = [
        'company',
        'contact_person',
        'mobile_number',
        'address',
    ];
}
