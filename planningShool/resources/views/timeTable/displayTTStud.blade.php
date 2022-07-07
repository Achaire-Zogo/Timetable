@section('title')
Emploie de temps {{$filiere->nom_filiere}} {{$niveau->nom_niveau}}
@endsection
@extends('layouts.layout')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emploie de temps {{$filiere->nom_filiere}} {{$niveau->nom_niveau}} </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Emploie de temps {{$filiere->nom_filiere}} {{$niveau->nom_niveau}}  </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div  class="card-header">
              @if(count($existant)==0)
                <h3 class="card-title" style="color:red;"> Votre emploie de temps n'est pas encore disponible</h3>
                @else
                <h3 class="card-title" style="color:blue;"> Votre emploi de temps</h3>
                
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Heures/Jours</th>
                    @foreach($jour as $days)  
                    <th>{{$days->intitule}}</th>
                     @endforeach
                    
                    </tr>
                  </thead>
                  <tbody>
                  @php
                     
                     
                      $j=0;
                      @endphp
                      @foreach($heure as $hour)  
                      <tr >
                      <td >{{$hour->plage_horaire}}</td>
                      @foreach($jour as $day)  
                     
                      <td id="case{{$j}}">
                      @foreach($existant as $ex)
                      
                      @if($ex->id_jour==$day->id && $ex->id_heure==$hour->id)

                       

                      @if($ex->id_type!=1)
                      <p>{{$ex->type}}</p>
                      @endif
               <p>{{$ex->code_ue}}</p>
               <p>{{$ex->titre}} {{$ex->nom_enseignant}} {{$ex->prenom_enseignant}}</p>
               <p>{{$ex->nom_salle}}</p>
@if($ex->visible_grp==1)
<p>{{$ex->nom_groupe}}</p>
@endif
                 
               @endif
                        @endforeach
                      </td>
                      @php 
                  $j++;
                  @endphp
                 
                      @endforeach
</tr>

@endforeach   
                     
                      
                     
                  </tbody>
                </table>
                
              </div>
              <!-- /.card-body -->
              
            </div>
</div>
</div>
</div>
</section>
@endsection
@section('scripts')
<script>

 
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
"ordering": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
  });

         
</script>
        @endsection 