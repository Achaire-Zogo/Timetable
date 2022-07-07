@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">Ajouter  une unité d'enseignement</h3>

   <div class="mt-4">
       @if(session()->has("success"))
           <div class="alert alert-success">
               <h3>{{ session()->get("success") }}</h3>
           </div>
       @endif
    @if($errors->any())
        <div class="alert alert-danger">

            <ul >

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
     @endif
    <form  method='POST' action='{{ route('ue.ajouter') }}'>
        @csrf

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Code de l' UE</label>
          <input type="text" name='code_ue' class="form-control" >
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom de l'UE</label>
     <input type="text"        name="nom_ue"  class="form-control" >
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">classe</label>
             <select  class="form-control" name="id_classe" >
                <option value=""> </option>
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}">{{ $classe->nom_classe }}</option>
                @endforeach
            </select>
          </div>


          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialite</label>
             <select  class="form-control" name="id_specialite" >
                <option value=""> </option>
                @foreach ($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite}}</option>
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">enregister</button>
        <a href="{{ route('ue.liste') }}" class="btn btn-danger">annuler</a>
      </form>

    </div>


</div>

@endsection
