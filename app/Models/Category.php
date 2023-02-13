<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function authors(){
        return $this->belongsToMany(Author::class , 'author_categories' , 'author_id' , 
        'category_id' );
    }

    // public function articles(){
    //     return $this->hasMany(Article::class)->take(3)->orderBy('created_at' , 'desc');
    // }
    public function articles(){
        return $this->hasMany(Article::class)->take(3)->orderBy('created_at' , 'desc');
    }
}
