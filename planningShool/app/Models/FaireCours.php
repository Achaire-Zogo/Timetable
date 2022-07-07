<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaireCours extends Model
{
    use HasFactory;
    protected $fillable = ['id_ue', 'id_salle','id_jour','id_heure', 'id_type', 'id_groupe', 'id_enseignant', 'visible_grp', 'published'];

}
