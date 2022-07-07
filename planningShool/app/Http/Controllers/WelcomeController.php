<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $class= DB::table('classes')
        ->where('id_specialite', '1')
        ->join('niveaux', 'niveaux.id','=','classes.id_niveau')
        ->join('filieres', 'filieres.id', '=', 'classes.id_filiere')
     
         ->select('classes.id as id_classe','niveaux.id as id_niv','filieres.id as id_fil','classes.*','filieres.*', 'niveaux.*' )        
        ->get();
        
        return view('welcome',['class'=>$class]);
    }   //
    public function voirToutUser()
    {
        $class= DB::table('classes')
        ->where('id_specialite', '1')
        ->join('niveaux', 'niveaux.id','=','classes.id_niveau')
        ->join('filieres', 'filieres.id', '=', 'classes.id_filiere')
     
         ->select('classes.id as id_classe','niveaux.id as id_niv','filieres.id as id_fil','classes.*','filieres.*', 'niveaux.*' )        
        ->get();
        
        return view('home',['class'=>$class]);
    }
   
}
