<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Country extends Model
{
    public $timestamps = false;

    public $fillable = [
        'id', 'name','dialing_code','country_code','flag'
    ];

    public function state(): HasMany
    {
        return $this->hasMany(States::class);
    }
}
