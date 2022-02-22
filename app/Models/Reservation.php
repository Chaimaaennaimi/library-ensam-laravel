<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = ['state'];

    public function etudiant(){

        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }
    public function copy(){
        return $this->belongsTo(Copy::class, 'copy_id');
    }
}