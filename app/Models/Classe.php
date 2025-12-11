<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['nom','niveau'];

    public function students(){
        return $this->hasMany(User::class,'class_id')->where('role','student');
    }
}
