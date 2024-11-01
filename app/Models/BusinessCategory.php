<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title','url'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function users_category()
{
    return $this->hasMany(User::class, 'category_id');
}
public function artisanServices()
{
    return $this->hasMany(ArtisanServices::class, 'business_category_id');
}

}
