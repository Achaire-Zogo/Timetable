<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\EnseignantsFilieres;
use App\Models\Filiere;

class EnseignantFiliereController extends Controller
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
    public function create()
    {
        //
        $fil= Filiere::all();
        $ens= Enseignant::all();
        return view('EnseignantFiliere/createEnsFil',['filiere'=>$fil, 'enseignant'=>$ens]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ef=EnseignantsFilieres::where('id_enseignant',$request->enseignant)->where('id_filiere',$request->filiere)->get();
        if(count($ef)==0){
        $req=EnseignantsFilieres::create(['id_enseignant'=>$request->enseignant,'id_filiere'=>$request->filiere]);
        return back()->with('success', 'effectue');
    
    }
else {
    return back()->with('error', 'enseignant deja existant pour cette filiere');
}
     
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
