@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">Ajouter  une UE</h3>

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
    <form  method='POST' action='{{ route('ue.update', [$ue->id]) }}'>
        @csrf
        <input type="hidden" name="_method" value="put" >
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Code de l UE</label>
          <input type="text" name='code_ue' class="form-control"  value="{{ $ue->code_ue  }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">NOn de l UE</label>
            <input type="text"        name="nom_ue"  class="form-control" value="{{ $ue->nom_ue }} " >
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Classe</label>
             <select  class="form-control" name="id_classe" >
                <option value=""> </option>
                @foreach ($classes as $classe)
                    @if($classe->id == $ue->id_classe )
                        <option value="{{ $classe->id }}" selected>{{ $classe->nom_classe }}</option>
                    @else
                        <option value="{{ $classe->id }}">{{ $classe->nom_classe }}</option>
                    @endif
                @endforeach
            </select>
          </div>


          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialite</label>
             <select  class="form-control" name="id_specialite" >
                <option value=""> </option>
                @foreach ($specialites as $specialite)
                    @if($specialite->id == $ue->id_specialite )
                        <option value="{{ $specialite->id }}" selected>{{ $specialite->nom_specialite}}</option>
                    @else
                        <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite}}</option>
                    @endif
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">enregister</button>
        <a href="{{ route('ue.liste') }}" class="btn btn-danger">annuler</a>
      </form>

    </div>


</div>

@endsection
