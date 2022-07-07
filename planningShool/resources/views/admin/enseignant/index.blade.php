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
          <h1>Listes Des Enseignants</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Enseignant</li>
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
              <h3 class="card-title">Ici est affiché la liste des enseignants de l'université</h3>
              <div class="float-right">
                <a href="{{ route('admin.enseignant.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Matricule</th>
                  <th>Titre</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>telephone</th>
                  <th>Email</th>
                  <th>Adresse</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($enseignants as $enseignant)
                        <tr>
                            <td>{{$enseignant->matricule}}</td>
                            <td>{{$enseignant->titre}}</td>
                            <td>{{$enseignant->nom_enseignant}}</td>
                            <td>{{$enseignant->prenom_enseignant}}</td>
                            <td>{{$enseignant->telephone}}</td>
                            <td>{{$enseignant->email}}</td>
                            <td>{{$enseignant->adresse}}</td>
                            <td>
                               
                                <a class="btn btn-outline-danger" href="{{ route('admin.enseignant.edit', $enseignant->id) }}" title="edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-xs btn-primary" href="{{ route('displayTTEns', ['matricule'=>$enseignant->matricule, 'nom'=>$enseignant->nom_enseignant]) }}" >
                                   voir son emploie de temps
                                </a>
                                <a class="btn btn-outline-danger" href="" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <form id="delete-form" action="{{ route('admin.enseignant.destroy', $enseignant->id) }}" method="POST" class="d-none">
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
