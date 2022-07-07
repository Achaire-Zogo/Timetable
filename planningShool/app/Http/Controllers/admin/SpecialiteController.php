<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speciale = Specialite::all();
        return view('admin.specialite.index', compact('speciale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialite.create');
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
            SPecialite::create([
                'code_specialite' => $request->input('code'),
                'nom_specialite' => $request->input('nom'),
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
            $speciale = Specialite::findOrFail($id);
            return view('admin.specialite.edit', compact('speciale'));
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
            Specialite::where('id', $id)->update([
                'code_specialite' => $request->input('code'),
                'nom_specialite' => $request->input('nom'),
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
            $spec = Specialite::findOrFail($id);
            $spec->delete();
            Toastr::success('messages', trans('success'));
            return back();
        }catch(\Exception $e){
            Toastr::error('message', trans('erreur de supression'));
            return back();
        }
    }
}
