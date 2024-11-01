<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerRequest extends Model
{
    use HasFactory;



    public function freelancer()
    {
        return $this->belongsTo(User::class, "freelancer_id");
    }
}
