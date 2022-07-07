<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use Brian2694\Toastr\Facades\Toastr;


class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salles = Salle::all();//where('role_id', '!=', 1)->get();
        return view('admin.salle.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salle.create');
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
            Salle::create([
                'nom_salle' => $request->input('nom_salle'),
                'capacite_salle' => $request->input('capacite_salle'),
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
            $salle = Salle::findOrFail($id);
            return view('admin.salle.edit', compact('salle'));
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
            Salle::where('id', $id)->update([
                'nom_salle' => $request->input('nom_salle'),
                'capacite_salle' => $request->input('capacite_salle'),
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
            $salle = Salle::findOrFail($id);
            $salle->delete();
            Toastr::success('messages', trans('success'));
            return back();
        }catch(\Exception $e){
            Toastr::error('message', trans('erreur de supression'));
            return back();
        }
    }
}
