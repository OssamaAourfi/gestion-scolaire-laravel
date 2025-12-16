<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'matiere_id', 'valeur'];

    // Relation m3a Tilmid
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation m3a Madda
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}