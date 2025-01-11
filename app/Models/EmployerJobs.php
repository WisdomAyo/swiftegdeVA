<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerJobs extends Model
{
    use HasFactory;

    /**
     * @var mixed|null
     */
    protected $user_id;
    /**
     * @var mixed
     */
    protected $job_title;
    /**
     * @var mixed
     */
    protected $firstname;
    /**
     * @var mixed
     */
    protected $lastname;
    /**
     * @var mixed
     */
    protected $email;
    /**
     * @var mixed
     */
    protected $phone;
    /**
     * @var mixed
     */
    protected $industry;
    /**
     * @var mixed
     */
    protected $position;
    /**
     * @var mixed
     */
    protected $hire_type;
    /**
     * @var mixed
     */
    protected $quantity;
    /**
     * @var mixed|string
     */
    protected $age_range;
    /**
     * @var mixed
     */
    protected $job_description;
    /**
     * @var mixed
     */
    protected $experience;
    /**
     * @var mixed
     */
    protected $level_of_education;
    /**
     * @var mixed
     */
    protected $it_skills;
    /**
     * @var mixed
     */
    protected $basic_salary;
    /**
     * @var mixed
     */
    protected $allowances;
    /**
     * @var mixed
     */
    protected $state_id;
    /**
     * @var mixed
     */
    protected $city_id;
     /**
     * @var mixed
     */
    protected $country_id;
    /**
     * @var mixed
     */
    protected $application_deadline;
    /**
     * @var mixed
     */
    protected $gender;
        /**
     * @var mixed
     */
    protected $skills;
        /**
     * @var mixed
     */
    protected $benefits;
        /**
     * @var mixed
     */
    protected $special_requirement;
        /**
     * @var mixed
     */
    protected $views;
          /**
     * @var mixed
     */
    protected $url;



    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function category(){
        return $this->belongsTo(BusinessCategory::class);
    }

    public function applicants()
{
    return $this->hasMany(JobApplications::class, 'job_id', 'id');
}
}
