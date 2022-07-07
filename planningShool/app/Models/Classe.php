<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['nom_classe', 'capacite_classe', 'id_filiere', 'id_niveau', 'id_specialite'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'id_specialite');
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'id_classe');
    }
}
