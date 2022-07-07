@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">edition  d une classe</h3>

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
    <form  method='POST' action="{{ route('classe.update', ['classe'=>$classe->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nom de la classe</label>
          <input type="text" name='nom_classe' class="form-control" value="{{ $classe->nom_classe  }}" >
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">capacité</label>
     <input type="text"        name="capacite_classe"  class="form-control" value="{{ $classe->capacite_classe }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Filieres</label>
             <select  class="form-control" name="id_filiere" >
                <option value=""> </option>
                @foreach ($filieres as $filiere)
                    @if($filiere->id == $classe->id_filiere  )
                        <option value="{{ $filiere->id }}" selected>{{ $filiere->nom_filiere }}</option>
                    @else
                        <option value="{{ $filiere->id }}">{{ $filiere->nom_filiere }}</option>
                    @endif
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">niveaux</label>
             <select  class="form-control" name="id_niveau" >
                <option value=""> </option>
                @foreach ($niveaux as $niveau)
                    @if($niveau->id == $classe->id_niveau )
                      <option value="{{ $niveau->id }}" selected>{{ $niveau->nom_niveau}}</option>
                    @else
                        <option value="{{ $niveau->id }}">{{ $niveau->nom_niveau}}</option>
                    @endif
                @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialite</label>
             <select  class="form-control" name="id_specialite" >
                <option value=""> </option>
                @foreach ($specialites as $specialite)
                    @if($specialite->id == $classe->id_specialite )
                        <option value="{{ $specialite->id }}" selected>{{ $specialite->nom_specialite}}</option>
                    @else
                        <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite}}</option>
                    @endif
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">enregister</button>
        <a href="{{ route('classe.liste') }}" class="btn btn-danger">annuler</a>
      </form>

    </div>


</div>

@endsection
