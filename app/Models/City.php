<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function users(){
        return $this->hasMany(User::class , 'city_id'  , 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
