
@section('title')
home
@endsection
@extends('layouts.layout')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emploie de temps </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tous les emploies de temps</li>
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
                <h3 class="card-title"><a href="{{route('displayCompleteTT' )}}" class="btn btn-xs btn-success">voir l'emploie de temps de toutes les filieres</a>
              </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Emploie de temps</th>
                     
                    <th>Action</th>
                   
                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($class as $cls)
                 <tr><td>{{$cls->nom_filiere}} {{$cls->nom_niveau}}</td>
     
                 <td>             @if (Auth::check())<a href="{{route('createTTStep2',['filiere'=>$cls->id_filiere, 'niveau'=>$cls->id_niveau] )}}" class="btn btn-xs btn-primary">Modifier</a>
                 @endif
                 <a href="{{route('displayTTStud',['spec'=>1,'filiere'=>$cls->id_filiere, 'niveau'=>$cls->id_niveau] )}}" class="btn btn-xs btn-success">Afficher</a>
                
</td>

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
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @endsection
