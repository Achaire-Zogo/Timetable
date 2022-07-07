@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4 mt-5">Liste des classe de  UY1</h3>

   <div class="d-flex justify-content-between mb-2">
    {{--  {{ $classes->links() }}  --}}
       <div><a href='{{ route('classe.create') }}' class="btn btn-primary">Ajouter une nouvelle classe</a></div>
   </div>


    <div>
        @if(session()->has("successDelete"))
            <div class="alert alert-successDelete">
                <h3>{{ session()->get("successDelete") }}</h3>
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

        <table class="table table-bordered table-hover mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Non de la classe</th>
                <th scope="col">nombre d étudiant </th>
                <th scope="col">filiere</th>
                <th scope="col">niveau</th>
                <th scope="col">specialite</th>
                <th scope="col">action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe )

              <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{ $classe->nom_classe }}</td>
                <td>{{ $classe->capacite_classe }}</td>
                <td>{{ $classe->filiere->nom_filiere }}</td>
                <td>{{ $classe->niveau->nom_niveau }}</td>
                <td>{{ $classe->specialite->nom_specialite }}</td>
                <td>
                    <a href="{{ route('classe.edite', ['classe'=>$classe->id]) }}" class="btn btn-info">edité la classe</a>
                    <a href="{{  route('groupe.liste', ['classe'=>$classe->id])}}" class="btn btn-info">voir les groupes</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cet classe?')){
                        document.getElementById('form-{{ $classe->id }}').submit()
                    }">suprimer</a>
                    <form id="form-{{ $classe->id }}" action="{{ route('classe.supprimer', ['classe'=>$classe->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
