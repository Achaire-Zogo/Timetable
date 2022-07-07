<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Specialite;
use App\Models\UniteEnseignement;
use Illuminate\Http\Request;

class ueController extends Controller
{
    public function ue(){
       $ues = UniteEnseignement::all();
       return view('ue.ue', ['ues'=>$ues]);
    }

    public function create(){
        $classes = Classe::all();
        $specialites = Specialite::all();
        return view('ue.ajouterUE', ['classes'=>$classes, 'specialites'=>$specialites]);
    }

    public function ajouter(Request $request){
        $request->validate([
            'code_ue'=>'required',
            'nom_ue'=>'required',
            'id_classe'=>'required',
            'id_specialite'=>'required',
        ]);
        UniteEnseignement::create($request->all());

        return back()->with('success', 'classe ajouté avec succè');
    }

    public function supprimer(UniteEnseignement $ue){
        $ue->delete();

        return back()->with('success', 'UE supprimer  avec succè');
    }

    public function edite(UniteEnseignement $ue){
        $classes = Classe::all();
        $specialites = Specialite::all();
        return view('ue.editUe', ['classes'=>$classes, 'specialites'=>$specialites, 'ue'=>$ue]);
    }

    public function update(UniteEnseignement $ue, Request $request){
        // dd($ue);
        $request->validate([
            'code_ue'=>'required',
            'nom_ue'=>'required',
            'id_classe'=>'required',
            'id_specialite'=>'required'
        ]);

        $ue->update([
            'code_ue'=>$request->code_ue,
            'nom_ue'=>$request->nom_ue,
            'id_classe'=>$request->id_classe,
            'id_specialite'=>$request->id_specialite
        ]);
        return back()->with('success', 'UE modifier avec succè');
    }
}
