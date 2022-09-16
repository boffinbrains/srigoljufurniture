<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'reference_number',
        'client_name',
        'price_type',
        'sub_total',
        'grand_total',
        'discount_type',
        'sector',
        'terms_and_conditions',
        'bank_id',
        'made_by',
        'added_date'
    ];
}
