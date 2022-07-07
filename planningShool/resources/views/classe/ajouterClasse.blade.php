@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">Ajouter  une classe</h3>

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
    <form  method='POST' action='{{ route('classe.ajouter') }}'>
        @csrf

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nom de la classe</label>
          <input type="text" name='nom_classe' class="form-control" >
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">capacité</label>
            <input type="text"        name="capacite_classe"  class="form-control" >
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Filieres</label>
             <select  class="form-control" name="id_filiere" >
                <option value=""> </option>
                @foreach ($filieres as $filiere)
                    <option value="{{ $filiere->id }}">{{ $filiere->nom_filiere }}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">niveaux</label>
             <select  class="form-control" name="id_niveau" >
                <option value=""> </option>
                @foreach ($niveaux as $niveau)
                    <option value="{{ $niveau->id }}">{{ $niveau->nom_niveau}}</option>
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
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">combien de groupe à cette classe</label>
            <input type="number "        name="nombre_groupe"  class="form-control" value=1 >
        </div>
        <button type="submit" class="btn btn-primary">enregister</button>
        <a href="{{ route('classe.liste') }}" class="btn btn-danger">annuler</a>
      </form>

    </div>


</div>

@endsection
