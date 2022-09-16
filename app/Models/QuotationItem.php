<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'quotation_id',
        'name',
        'quantity',
        'unit_price',
        'rate',
        'discounted_total'
    ];
}
