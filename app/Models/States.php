<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class States extends Model
{
    public $timestamps = false;

    public $fillable = [
        'id', 'country_id','name','is_active'
    ];


    public function countries(): BelongsTo
    {
        return $this->belongsTo(Country::class,"country_id");
    }

    public function stateAreas(): HasMany
    {
        return $this->hasMany(StateAreas::class);
    }
}
