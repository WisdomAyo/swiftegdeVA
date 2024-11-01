<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StateAreas extends Model
{

    public $timestamps = false;

    public $fillable = [
        'id', 'state_id','name','is_active'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(States::class,"state_id");
    }

}
