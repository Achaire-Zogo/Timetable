<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Groupe;
use Illuminate\Http\Request;

class groupeController extends Controller
{
    public function groupe(Classe $classe){
        // dd($classe);
        return view('groupe.groupe', ['classe'=>$classe]);
    }

    public function create($classe, ){
        // dd($classe);

        return view('groupe.ajouterGroupe', ['classe'=>$classe]);
    }

    public function ajouter($classe, Request $request){
        $request->validate([
            'nom_groupe'=>'required',
            'nb_etudiants'=>'required'
        ]);
        // dd($classe);
        Groupe::create([
            'nom_groupe'=>$request->nom_groupe,
            'nb_etudiants'=>$request->nb_etudiants,
            'id_classe'=>$classe
        ]);
        return back()->with('success', 'groupe ajouter avec succè' );
    }

    public function supprimer(Groupe $groupe){
        $groupe->delete();
        return back()->with('success', 'groupe supprimer avec succè' );
    }

    public function edite(Groupe $groupe, $classe){
        // dd($groupe);
        return view('groupe\editeGroupe', ['groupe'=>$groupe,  'classe'=>$classe]);
    }

    public function update(Request $request, Groupe $groupe, $classe){
        $request->validate([
            'nom_groupe'=>'required',
            'nb_etudiants'=>'required'
        ]);

        $groupe->update([
            'nom_groupe'=>$request->nom_groupe,
            'nb_etudiants'=>$request->nb_etudiants,
            'id_classe'=>$classe
        ]);
        return back()->with('success', 'edition fait avec succè' );

    }
}
