@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Listes Des salles</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Salles</li>
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
            <div class="card-header">
              <h3 class="card-title">Ici est affiché la liste des salles de l'université</h3>
              <div class="float-right">
                <a href="{{ route('admin.salle.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Capacité</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($salles as $salle)
                        <tr>
                            <td>{{$salle->nom_salle}}</td>
                            <td>{{$salle->capacite_salle}}</td>
                            <td>
                               
                                <a class="btn btn-outline-danger" href="{{ route('admin.salle.edit', $salle->id) }}" title="edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-xs btn-primary" href="{{ route('displayTTHall', ['salle'=>$salle->id]) }}" >
                                   voir son emploie de temps
                                </a>
                                <a class="btn btn-outline-danger" href="" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <form id="delete-form" action="{{ route('admin.salle.destroy', $salle->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->


        
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
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
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @endsection
