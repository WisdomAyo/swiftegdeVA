<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',    // Allow mass assignment for user_id
        'images',     // Other fields that you allow mass assignment
    ];
}
