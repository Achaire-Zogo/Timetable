<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $fillable = ['id_classe', 'nb_etudiants', 'nom_groupe'];

    public function classe(){
        return $this->belongsTo(Classe::class, 'id_classe');
    }
}
