<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Niveau;
use App\Models\Specialite;


class classeController extends Controller
{

    public function classe(){
        $classes = Classe::all();

        // dd($classes);
       return view('classe.classe', ['classes'=>$classes]);
    }

    public function create(){
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        $specialites = Specialite::all();
        // dd($filieres);
       return view('classe.ajouterClasse',['niveaux'=>$niveaux, 'filieres'=>$filieres, 'specialites'=>$specialites]);
    }

    public function ajouter(Request $request){
        $request->validate([
            "nom_classe"=>"required",
            "capacite_classe"=>"required",
            "id_filiere"=>"required",
            "id_niveau"=>"required",
            "id_specialite"=>"required"
        ]);
        // dd($request);
        Classe::create($request->all());
        $classe = Classe::where('nom_classe', $request->nom_classe)->get();
        $classe = $classe[0];
        // for ($i=0; $i<$request->nombre_groupe; $i++) {
        //     $classe->groupes()->create([
        //         'nb_etudiants'=>($request->capacite_classe)/$request->nombre_groupe
        //     ]);
        //  }
        for ($i=1; $i<=$request->nombre_groupe; $i++) {
            Groupe::create([
                'id_classe'=>$classe->id,
                'nb_etudiants'=>($request->capacite_classe)/$request->nombre_groupe,
                'nom_groupe'=>"groupe $i"
            ]);
        }

        return back()->with('success', 'classe ajouté avec succè');
    }

    public function supprimer(Classe $classe){
        $classe->delete();
        // Classe::find($classe)->delete();
        // $classe->delete();

        return back()->with("successDelete", "classe supprimer avec sucès");

    }

    public function update(Request $request, Classe $classe){
        $request->validate([
            "nom_classe"=>"required",
            "capacite_classe"=>"required",
            "id_filiere"=>"required",
            "id_niveau"=>"required",
            "id_specialite"=>"required"
        ]);
        // Classe::create($request->all());
        $classe->update([
            "nom_classe"=>$request->nom_classe,
            "capacite_classe"=>$request->capacite_classe,
            "id_filiere"=>$request->id_filiere,
            "id_niveau"=>$request->id_niveau,
            "id_specialite"=>$request->id_specialite
        ]);

        return back()->with('success', 'classe nise à jour avec succè');
    }

    public function edite(Classe $classe)
    {
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        $specialites = Specialite::all();
        return view('classe.editClasse', ['niveaux'=>$niveaux, 'filieres'=>$filieres, 'specialites'=>$specialites, 'classe'=>$classe ]);
    }
}
