@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
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
    <h3 class="border-bottom pb-2 mb-4 mt-5">Liste des classe de  UY1</h3>

   <div class="d-flex justify-content-between mb-2">
    {{--  {{ $classes->links() }}  --}}
       <div><a href='{{ route('groupe.create', ['classe'=>$classe->id]) }}' class="btn btn-primary">Ajouter un nouveau groupe</a></div>
   </div>


    <div>

        <table class="table table-bordered table-hover mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nom du groupe</th>
                <th scope="col">nom de la classe</th>
                 <th scope="col">capacite</th>
                <th scope="col">action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($classe->groupes as $groupe )

              <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{ $groupe->nom_groupe }}</td>
                <td>{{ $classe->nom_classe}}</td>
                <td>{{ $groupe->nb_etudiants }}</td>

                <td>
                    <a href="{{ route('groupe.edite', ['groupe'=>$groupe->id, 'classe'=>$classe->id]) }}" class="btn btn-info">éditer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous supprimer ce groupe?')){
                        document.getElementById('form-{{ $groupe->id }}').submit()
                    }" >suprimer</a>
                    <form id="form-{{ $groupe->id }}" action="{{ route('groupe.supprimer', ['groupe'=>$groupe->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="delete" >
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
