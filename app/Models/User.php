<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'city_id',
        'state_id',
        'country_id',
        'profile_image',
        'Location_address',
        'delivery_address',
        'role',
        'business_category',
        'business_name',
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
        'company_logo',
        'video_url', 
        'video_file',
        'ngn_rate',
        'resume',
        'category_id',
        'is_influencer',
        'social_media',
        'skillLevel',
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

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id'); // 'country' is the foreign key in the users table
    }

    // Add relationship for state
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id'); // 'state' is the foreign key in the users table
    }

    // Add relationship for city
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id'); // 'city' is the foreign key in the users table
    }

//     public function getStateNameAttribute()
// {
//     return $this->state->name ?? 'Unknown State';
// }

// public function getCountryNameAttribute()
// {
//     return $this->country->name ?? 'Unknown Country';
// }


    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'category_id');
    }

    public function mySkills()
    {
        return $this->hasMany(MySkill::class, 'user_id'); 
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
    public function award()
{
    return $this->hasMany(AwardsAndCertificates::class);
}

public function gallery()
{
    return $this->hasMany(ArtisanGallery::class);
}


    protected static function boot()
{
    parent::boot();

    static::updating(function ($user) {
        \Log::info('Updating user:', $user->toArray());
    });

    static::updated(function ($user) {
        \Log::info('User updated:', $user->toArray());
    });
}

}
