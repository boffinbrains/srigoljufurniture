<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = "catalogue";
    use HasFactory;
    protected $fillable = [
        'title',
        'pdf',
    ];
}
