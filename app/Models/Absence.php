<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'justifie',
    ];

    public function student(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
