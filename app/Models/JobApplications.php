<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplications extends Model
{
    use HasFactory;


    protected $fillable = [
        'job_id', 'user_id', 'full_name', 'location_address', 'email', 'phone', 'dob', 'skills', 'skillLevel',
        'availability', 'certification', 'employer_id', 'cv','status'
    ];

    public function job()
    {
        return $this->belongsTo(EmployerJobs::class, 'job_id', 'id');
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function applicant()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
