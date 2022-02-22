<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'id_categorie');
    }

    public function copies(){
        return $this->hasMany('App\Copy','book_id');
    }
}