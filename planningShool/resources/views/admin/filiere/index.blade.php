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
          <h1>Listes Des Filières</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Filières</li>
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
              <h3 class="card-title">Ici est affiché la liste des filières de l'établissement</h3>
              <div class="float-right">
                <a href="{{ route('admin.filiere.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom de la filière</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($filieres as $filiere)
                        <tr>
                            <td>{{$filiere->nom_filiere}}</td>
                            <td>
                          
                                <a class="btn btn-outline-danger" href="{{ route('admin.filiere.edit', $filiere->id) }}" title="edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-outline-danger" href="" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <form id="delete-form" action="{{ route('admin.filiere.destroy', $filiere->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a  href="{{ route('voirEnsFil', ['filiere'=>$filiere->id]) }}" class="btn btn-xs btn-primary" >
                                    voir les enseignants de la filiere
                                </a>
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
