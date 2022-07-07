<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Niveau;
use Brian2694\Toastr\Facades\Toastr;

class NiveauCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Niveau::all();//where('role_id', '!=', 1)->get();
        return view('admin.niveau.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.niveau.create');
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
            Niveau::create([
                'nom_niveau' => $request->input('name_level'),
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
            $level = Niveau::findOrFail($id);
            return view('admin.niveau.edit', compact('level'));
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
            Niveau::where('id', $id)->update([
                'nom_niveau' => $request->input('name_level'),
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
            $level = Niveau::findOrFail($id);
            $level->delete();
            Toastr::success('messages', trans('success'));
            return back();
        }catch(\Exception $e){
            Toastr::error('message', trans('erreur de supression'));
            return back();
        }
    }
}
