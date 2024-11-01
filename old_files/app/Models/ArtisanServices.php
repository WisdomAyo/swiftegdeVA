<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanServices extends Model
{
    public function User(){
        return $this->hasMany(User::class);
    }

}
