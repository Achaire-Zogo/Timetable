<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\EnseignantsFilieres;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('admin.filiere.index', compact('filieres'));
    }
    
    public function voirEnsFil(Request $request)
    {
        $ens= DB::table('enseignants_filieres')
        ->where('enseignants_filieres.id_filiere',$request->filiere)
        ->join('enseignants', 'enseignants.id', '=', 'enseignants_filieres.id_enseignant')
     
         ->select('enseignants_filieres.id as id_EF','enseignants.*','enseignants_filieres.*' )        
        ->get();
        return view('admin/filiere/voirEnsFil', ['ens'=>$ens]);
    }
    public function delEnsFil(Request $request)
    {
        $ens= EnseignantsFilieres::
      where('id',$request->id)
     ->delete();
        return back();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filiere.create');
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
            Filiere::create([
                'nom_filiere' => $request->input('nom_filiere'),
                
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
            $filiere = Filiere::findOrFail($id);
            return view('admin.filiere.edit', compact('filiere'));
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
            Filiere::where('id', $id)->update([
                'nom_filiere' => $request->input('nom_filiere'),
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
            $filiere = Filiere::findOrFail($id);
            $filiere->delete();
            Toastr::success('messages', trans('success'));
            return back();
        }catch(\Exception $e){
            Toastr::error('message', trans('erreur de supression'));
            return back();
        }
    }
}
