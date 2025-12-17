<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emploi extends Model
{
    use HasFactory;

    protected $fillable = ['classe_id', 'matiere_id', 'jour', 'heure_debut', 'heure_fin'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
