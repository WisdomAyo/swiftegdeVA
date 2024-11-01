<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_category',
        'number_of_freelancers',
        'budget',
        'area_of_specialization',
        'pay_type',
        'min_pay',
        'max_pay',
        'location',
        'other_details',
        'monthly_pay_amount',
    ];

    protected $casts = [
        'area_of_specialization' => 'array',
    ];

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, "business_category");
    }
}
