@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">Modifier un groupe</h3>

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
    <form  method='POST' action='{{ route('groupe.update', ['groupe'=>$groupe->id, 'classe'=>$classe]) }}'>
        @csrf
        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">nom du groupe</label>
          <input type="text" name='nom_groupe' class="form-control" value="{{ $groupe->nom_groupe }}">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">capacite</label>
     <input type="text"        name="nb_etudiants"  class="form-control" value="{{ $groupe->nb_etudiants }}" >
        </div>



        <button type="submit" class="btn btn-primary">enregister</button>
        <a href='{{ route('groupe.liste', ['classe'=>$classe]) }}' class="btn btn-danger">annuler</a>
      </form>

    </div>


</div>

@endsection
