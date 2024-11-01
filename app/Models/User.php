<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'gender',
        'email',
        'identity',
        'availability',
        'password',
        'phone',
        'date_of_birth',
        'street_address',
        'city',
        'state',
        'country',
        'profile_image',
        'Location_address',
        'delivery_address',
        'role',
        'business_category',
        'facebook',
        'instagram',
        'work_experience',
        'website_address',
        'service_description',
        'agreement_status',
        'compensation_type',
        'job_preference',
        'min_amount',
        'max_amount',
        'is_admin',
        'status',
        'usd_rate',
        'gbp_rate',
        'eur_rate',
        'ngn_rate',
        'resume',
        'category_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function ArtisanServices()
    {
        return $this->belongsTo(ArtisanServices::class);
    }

    public function cityName()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function stateName()
    {
        return $this->belongsTo(State::class, 'state');
    }
    public function countryName()
    {
        return $this->belongsTo(Country::class, 'country');
    }
    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'category_id');
    }

    public function mySkills()
    {
        return $this->hasMany(MySkill::class);
    }


    public function experience()
    {
        return $this->hasMany(Experience::class);
    }


    public function videoBio()
    {
        return $this->hasOne(VideoBio::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

}
