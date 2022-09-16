<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected function getProductGallery($id)
    {
        $images = Images::where('gallery_id','P'.$id)->get();
        return $images;
    }
}
