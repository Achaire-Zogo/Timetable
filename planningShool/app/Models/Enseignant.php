<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule','titre','nom_enseignant','prenom_enseignant','telephone','email','adresse'
    ];
}
