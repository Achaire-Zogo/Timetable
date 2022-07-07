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
    <h3 class="border-bottom pb-2 mb-4 mt-5">Liste des unites d'enseignement</h3>

   <div class="d-flex justify-content-between mb-2">
    {{--  {{ $classes->links() }}  --}}
       <div><a href='{{ route('ue.ajouter') }}' class="btn btn-primary">Ajouter une nouvelle UE</a></div>
   </div>


    <div>

        <table class="table table-bordered table-hover mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">code-UE</th>
                <th scope="col">nom-UE</th>
                <th scope="col">classe</th>
                <th scope="col">Specialite </th>
                <th scope="col">action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ues as $ue )

              <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{ $ue->code_ue }}</td>
                <td>{{ $ue->nom_ue }}</td>
                <td>{{ $ue->classe->nom_classe }}</td>
                <td>{{ $ue->specialite->nom_specialite}}</td>

                <td>
                    <a href="{{ route('ue.edite', ['ue'=>$ue->id]) }}" class="btn btn-info">éditer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous supprimer cette UE?')){
                        document.getElementById('form-{{ $ue->id }}').submit()
                    }" >suprimer</a>
                    <form id="form-{{ $ue->id }}" action="{{ route('ue.supprimer', ['ue'=>$ue->id]) }}" method="POST">
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
