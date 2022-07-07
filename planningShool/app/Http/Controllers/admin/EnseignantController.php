<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enseignant;
use Brian2694\Toastr\Facades\Toastr;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('admin.enseignant.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enseignant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Enseignant::create([
                'matricule' => $request->input('matricule'),
                'titre' => $request->input('titre'),
                'nom_enseignant' => $request->input('nom_enseignant'),
                'prenom_enseignant' => $request->input('prenom_enseignant'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'adresse' => $request->input('adresse'),

            ]);
            Toastr::success('messages', trans('success'));
            return back();
        } catch(\Exception $e) {
            Toastr::error('message', trans('erreur'));
            return back();
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
        try {
            $enseignant = Enseignant::findOrFail($id);
            return view('admin.enseignant.edit', compact('enseignant'));
        } catch(\Exception $e) {
            Toastr::error('message', trans('failed to load'));
            return back();
        }
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
        try {
            Enseignant::where('id', $id)->update([
                'matricule' => $request->input('matricule'),
                'titre' => $request->input('titre'),
                'nom_enseignant' => $request->input('nom_enseignant'),
                'prenom_enseignant' => $request->input('prenom_enseignant'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'adresse' => $request->input('adresse'),
            ]);
            Toastr::success('messages', trans('success'));
            return back();
        } catch(\Exception $e) {
            Toastr::error('messages', trans('erreur'));
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $enseignant = Enseignant::findOrFail($id);
            $enseignant->delete();
            Toastr::success('messages', trans('success'));
            return back();
        }catch(\Exception $e){
            Toastr::error('message', trans('erreur de supression'));
            return back();
        }
    }
}
