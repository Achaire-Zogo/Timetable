<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteEnseignement extends Model
{
    use HasFactory;

    protected $fillable = ['code_ue','nom_ue','id_classe', 'id_specialite'];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'id_specialite');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }
}
