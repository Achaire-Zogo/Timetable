<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Jour;
use App\Models\Heure;
use App\Models\Filiere;
use App\Models\Classe;
use App\Models\Groupe;
use App\Models\Salle;
use App\Models\FaireCours;
use App\Models\Niveau;
use App\Models\TypesCours;
use App\Models\Niveaux_Filieres;
use App\Models\UniteEnseignement;
use App\Models\Specialite;
use App\Models\Enseignant;
use App\Models\EnseignantsFilieres;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //afficher le formulaire de selection de filiere, de niiveau pour creer un emploi de temps
    public function create()
    {
        //
        $filiere=Filiere::all();//recupere la filiere
        $niveau=Niveau::all();
        
        return view('timeTable/createTimeTable',['filiere'=>$filiere, 'niveau'=>$niveau]); 
        
 
    }
    public function connectStudent()
    {
        //afficher le formulaire de selection de filier, niveau pour quun etudiant puisse voir son emploi de temps
        $filiere=Filiere::all();
        $niveau=Niveau::all();
        
        return view('timeTable/connectStudent',['filiere'=>$filiere, 'niveau'=>$niveau]); 
        
 
    }
    public function connectTeacher()
    {
           //afficher le formulaire pour quun enseignant puisse voir son emploi de temps
        
        
        
        return view('timeTable/connectTeacher'); 
        
 
    }
    public function searchSpec(Request $request)
    {
        //fouiller les specialites qui correspondent a une filiere et un niveau lorsquun etudiant veut consulter son emploi de temps
        $specialite= DB::table('classes')
        ->where('classes.id_filiere',$request->filiere)->where('classes.id_niveau',$request->niveau)
        ->where('classes.id_specialite', '!=',1)
        ->join('specialites', 'specialites.id', '=', 'classes.id_specialite')
     
         ->select('classes.id as id_classe','classes.*','specialites.*' )        
        ->get();
        //$spec=Specialite::all();
        return response()->json(['spec'=>$specialite]);
    }



//afficher l'emploie de temps d'un etudiant
    public function displayTTStud(Request $request)
    {
        //
        $filiere=Filiere::where('id',$request->filiere)->first();
        $niveau=Niveau::where('id',$request->niveau)->first();
        $heure=Heure::all();
        $jour=Jour::all();
       if ($request->spec!=1) {// s'il veut voir pour une specialite particuliere
           # code...
           $existant= DB::table('classes')
           ->where('classes.id_filiere',$request->filiere)->where('classes.id_niveau',$request->niveau)->where('classes.id_specialite',$request->spec)
          
           ->join('groupes', 'groupes.id_classe', '=', 'classes.id')
              ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id' )
              ->where('faire_cours.published',1)
              ->join('enseignants', 'enseignants.id', '=', 'faire_cours.id_enseignant' )
              ->join('salles', 'salles.id', '=', 'faire_cours.id_salle' )
              ->join('types_cours', 'types_cours.id', '=', 'faire_cours.id_type' )
              ->join('unite_enseignements', 'unite_enseignements.id', '=', 'faire_cours.id_ue' )
              
              ->select('groupes.id as id_grp', 'classes.id as id_classe',
              'enseignants.id as id_ens',
              'salles.id as id_hall',
              'types_cours.id as id_typ',
              'unite_enseignements.id as id_subject',
              'enseignants.*','salles.*','types_cours.*',
              'unite_enseignements.*',
              'classes.*','groupes.*','faire_cours.*' )     
                         ->get();
       }
       else{// s'il veut voir pour toutes les specialites 
        $existant= DB::table('classes')
        ->where('classes.id_filiere',$request->filiere)->where('classes.id_niveau',$request->niveau)
       
        ->join('groupes', 'groupes.id_classe', '=', 'classes.id')
           ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id' )
           ->where('faire_cours.published',1)
           ->join('enseignants', 'enseignants.id', '=', 'faire_cours.id_enseignant' )
           ->join('salles', 'salles.id', '=', 'faire_cours.id_salle' )
           ->join('types_cours', 'types_cours.id', '=', 'faire_cours.id_type' )
           ->join('unite_enseignements', 'unite_enseignements.id', '=', 'faire_cours.id_ue' )

         ->select('groupes.id as id_grp', 'classes.id as id_classe',
         'enseignants.id as id_ens',
         'salles.id as id_hall',
         'types_cours.id as id_typ',
         'unite_enseignements.id as id_subject',
         'enseignants.*','salles.*','types_cours.*',
         'unite_enseignements.*',
         'classes.*','groupes.*','faire_cours.*' )        
        ->get();
       }
     
       
      return view('timeTable/displayTTStud',[ 'existant'=>$existant, 'jour'=>$jour,'heure'=>$heure,  'filiere'=>$filiere, 'niveau'=>$niveau ]);
 
    }



//afficher l'emploi de temps d'un enseignant en fxn de son matricule recupere dans le formulaire
    public function displayTTEns(Request $request)
    {
        //
        $enseignant=Enseignant::where('matricule',$request->matricule)->first();
       $heure=Heure::all();
        $jour=Jour::all();
    $existant= DB::table('enseignants')
           ->where('enseignants.id',$enseignant->id)
           ->join('faire_cours', 'faire_cours.id_enseignant', '=', 'enseignants.id' )
           ->where('faire_cours.published',1)
           ->join('groupes', 'groupes.id', '=', 'faire_cours.id_groupe')
           ->join('classes', 'classes.id', '=', 'groupes.id_classe')
            ->join('salles', 'salles.id', '=', 'faire_cours.id_salle' )
              ->join('types_cours', 'types_cours.id', '=', 'faire_cours.id_type' )
              ->join('unite_enseignements', 'unite_enseignements.id', '=', 'faire_cours.id_ue' )
             
              ->select('groupes.id as id_grp',
             
              'enseignants.id as id_ens',
              'classes.id as id_classe',
              'salles.id as id_hall',
              'types_cours.id as id_typ',
              'unite_enseignements.id as id_subject',
              'enseignants.*','salles.*','types_cours.*',
              'unite_enseignements.*',
              'groupes.*','faire_cours.*' ,'classes.*')     
                         ->get();
     
     
         
      return view('timeTable/displayTTEns',[ 'existant'=>$existant, 'jour'=>$jour,'heure'=>$heure,  'ens'=>$enseignant]);
 
    }
    


    public function displayTTHall(Request $request)
    {
        //
        $salle=Salle::where('id',$request->salle)->first();

       $heure=Heure::all();
        $jour=Jour::all();
    $existant= DB::table('salles')
           ->where('salles.id',$request->salle)
           ->join('faire_cours', 'faire_cours.id_salle', '=', 'salles.id' )
           
           ->join('groupes', 'groupes.id', '=', 'faire_cours.id_groupe')
          ->join('classes', 'classes.id', '=', 'groupes.id_classe')
            ->join('enseignants', 'enseignants.id', '=', 'faire_cours.id_enseignant' )
              ->join('types_cours', 'types_cours.id', '=', 'faire_cours.id_type' )
              ->join('unite_enseignements', 'unite_enseignements.id', '=', 'faire_cours.id_ue' )
             
              ->select('groupes.id as id_grp',
             
              'enseignants.id as id_ens',
              'classes.id as id_classe',
              'salles.id as id_hall',
              'types_cours.id as id_typ',
              'unite_enseignements.id as id_subject',
              'enseignants.*','salles.*','types_cours.*',
              'unite_enseignements.*',
              'groupes.*','faire_cours.*' ,'classes.*')     
                         ->get();
     
     
         
      return view('timeTable/displayTTSalle',[ 'existant'=>$existant, 'jour'=>$jour,'heure'=>$heure,  'salle'=>$salle]);
 
    }



    public function displayCompleteTT()
    {
        //
     $allTT=array();
        $classes=Classe::where('id_specialite',1)->get();
        $heure=Heure::all();
        $jour=Jour::all();
        $i=0;
     foreach ($classes as $cls) {
         # code...
         $existant= DB::table('classes')
         ->where('classes.id',$cls->id)
        
        
         ->join('groupes', 'groupes.id_classe', '=', 'classes.id')
            ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id' )
            ->where('faire_cours.published',1)
            ->join('enseignants', 'enseignants.id', '=', 'faire_cours.id_enseignant' )
            ->join('salles', 'salles.id', '=', 'faire_cours.id_salle' )
            ->join('types_cours', 'types_cours.id', '=', 'faire_cours.id_type' )
            ->join('unite_enseignements', 'unite_enseignements.id', '=', 'faire_cours.id_ue' )
            
            ->select('groupes.id as id_grp', 'classes.id as id_classe',
            'enseignants.id as id_ens',
            'salles.id as id_hall',
            'types_cours.id as id_typ',
            'unite_enseignements.id as id_subject',
            'enseignants.*','salles.*','types_cours.*',
            'unite_enseignements.*',
            'classes.*','groupes.*','faire_cours.*' )     
                       ->get();
                       $allTT[$i]=$existant;
                       $allclass[$i]=$cls->nom_classe;
                       $i++;
     
     }
          
    
     
       
      return view('timeTable/displayAllTT',['allclass'=>$allclass,'classe'=>$classes,'allTT'=>$allTT, 'existant'=>$existant, 'jour'=>$jour,'heure'=>$heure]);
 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     //etape 2 de creation d'emploie de temps qui affiche les informations existantes sur l'emploie de temps s'il y en a, ouvoir ajouter de nouvelles infos et modifier dans un tableau
    
     public function createStep2(Request $request)
    {
        //
        Session::put('newTTCourse',$request->filiere);
        Session::put('newTTLevel',$request->niveau);
        $heure=Heure::all();
        $jour=Jour::all();
        $filiere=Filiere::where('id',$request->filiere)->first();
        $niveau=Niveau::where('id',$request->niveau)->first();
        $course=$filiere->nom_filiere;
        $level=$niveau->nom_niveau;
         $existant= DB::table('classes')
        ->where('classes.id_filiere',$request->filiere)->where('classes.id_niveau',$request->niveau)
       
        ->join('groupes', 'groupes.id_classe', '=', 'classes.id')
           ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id' )
         ->select('groupes.id as id_grp', 'classes.id as id_classe','classes.*','groupes.*','faire_cours.*' )        
        ->get();
        $faireCours=FaireCours::all();
        $type_cours=TypesCours::all();
        $enseignant= DB::table('enseignants_filieres')
        ->join('enseignants', 'enseignants.id', '=', 'enseignants_filieres.id_enseignant')
        ->where('enseignants_filieres.id_filiere', Session::get('newTTCourse'))
        ->select('enseignants_filieres.id as id_EF', 'enseignants.*')        
        ->get();

//dd($existant);
      $UE= DB::table('unite_enseignements')
       ->join('classes', 'classes.id', '=', 'unite_enseignements.id_classe')
       ->where('classes.id_filiere', Session::get('newTTCourse'))->where('classes.id_niveau', Session::get('newTTLevel'))
       ->select('classes.id as id_classe', 'unite_enseignements.*')
       
       ->get();
       $cls= Classe::where('id_filiere',Session::get('newTTCourse'))
       ->where('id_niveau',Session::get('newTTLevel'))
       ->get(['id']);
       
       $grp=Groupe::whereIn('id_classe', $cls)
       ->get(['id']);     
      return view('timeTable/fillTimeTable',['grp'=>$grp, 'jour'=>$jour, 'heure'=>$heure, 'type_cours'=>$type_cours, 'existant'=>$existant , 'enseignant'=>$enseignant, 'faireCours'=>$faireCours,'UE'=>$UE, 'request'=>$request, 'filiere'=>$course, 'niveau'=>$level]);
 
    }


    //faire des controles lors de la creation d'un emploie  de temps. Permet de recuperer les grps en fxn de l'UE choisi
    public function selectedUE(Request $request)
    {
        //
        $UE=UniteEnseignement::where('id',$request->UE)->first();
        $classe=Classe::where('id_specialite',$UE->id_specialite)->where('id_filiere',Session::get('newTTCourse'))->where('id_niveau',Session::get('newTTLevel'))->first();
        $groupe=Groupe::where('id_classe',$classe->id)->get();
        $grpActuelle= DB::table('groupes')
        ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id')
        ->where('faire_cours.id_jour',$request->jour)
        ->where('faire_cours.id_heure',$request->heure)
        ->where('faire_cours.id_ue',$request->UE)
        ->select('faire_cours.id as id_FC', 'groupes.*')        
        ->first();
        return response()->json(['groupe'=>$groupe, 'grpActuelle'=>$grpActuelle]);
    }


     //faire des controles lors de la creation d'un emploie  de temps. Permet de recuperer les salles en fxn du groupe et du nb d'etudiants dans le groupe 
    public function selectedGroup(Request $request)
    {
        //

        $group=Groupe::where('id',$request->Grp)->first();
        $salleActuelle= DB::table('salles')
        ->join('faire_cours', 'faire_cours.id_salle', '=', 'salles.id')
        ->where('faire_cours.id_jour',$request->jour)
        ->where('faire_cours.id_heure',$request->heure)
        ->where('faire_cours.id_ue',$request->ue)
        ->select('faire_cours.id as id_FC', 'salles.*')        
        ->first();
//dd( $salleActuelle);
$cls= Classe::where('id_filiere',Session::get('newTTCourse'))
->where('id_niveau',Session::get('newTTLevel'))
->get(['id']);

$grp=Groupe::whereIn('id_classe', $cls)
->get(['id']);
        $hal=FaireCours::where('id_jour',$request->jour)->where('id_heure',$request->heure)->where('id_ue','!=',$request->ue)->whereNotIn('id_groupe',$grp)->get(['id_salle']);
        $hall=DB::table('salles')
        ->where('salles.capacite_salle',">=",$group->nb_etudiants)
       
        ->whereNotIn('id', $hal)
        
        ->get();
        return response()->json(['hall'=>$hall, "nb_etud"=>$group->nb_etudiants, "salleActuelle"=>$salleActuelle]);
    }


    //enregistrer les cases d'un emploie de temps les  unes apres les autres
    public function saveCours(Request $request)
    {
        //
        //dd($request);
        //FaireCours::where('id_groupe', $request->Grp)->delete();
       $req=FaireCours::create(['id_ue'=>$request->UE,'id_salle'=>$request->Hall,'id_groupe'=>$request->Grp, 'id_jour'=>$request->Jour,'id_heure'=>$request->Heure, 'id_enseignant'=>$request->Teacher,'id_type'=>$request->Type, 'visible_grp'=>$request->VisGrp, 'published'=>$request->published]);

        return response()->json(['result'=>'ok']);
    }

    public function delEx(Request $request)
    {
      /* $ex= DB::table('classes')
        ->where('classes.id_filiere',Session::get('newTTCourse'))
        ->where('classes.id_niveau',Session::get('newTTLevel'))
        ->join('groupes', 'groupes.id_classe', '=', 'classes.id')
        ->join('faire_cours', 'faire_cours.id_groupe', '=', 'groupes.id')
       ->select('faire_cours*')
        ->delete(['faire_cours*']);  */

        $cls= Classe::where('id_filiere',Session::get('newTTCourse'))
        ->where('id_niveau',Session::get('newTTLevel'))
        ->get(['id']);

        $grp=Groupe::whereIn('id_classe', $cls)
        ->get(['id']);

       $fc=FaireCours::whereIn('id_groupe', $grp)
        ->delete();
      /* $del=DB::table('faire_cours')
        
        ->whereIn('id', $ex)
        
        ->delete();*/
        return response()->json(['result'=>'ok']);
    }

  /*public function selectedCourse($id)
    {
        //
       $json=0;
        $i=0;
        $levels=array();
        $filiere=Niveaux_Filieres::where('id_filiere',$id)->get();
        foreach ($filiere as $course) {
            $niveaux=Niveaux::where('id',$course['id_niveaux'])->first();
            $levels[$i]=$niveaux;
           // $json=json_encode($levels);
        }
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
