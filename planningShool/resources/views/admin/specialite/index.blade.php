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
          <h1>Listes Des Specialites</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Specialites</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ici est affiche la liste des Specialites de l etablissement</h3>
              <div class="float-right">
                <a href="{{ route('admin.specialites.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Nom Specialite</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($speciale as $level)
                        <tr>
                            <td>{{$level->code_specialite}}</td>
                            <td>{{$level->nom_specialite}}</td>
                            <td>

                                <a class="btn btn-outline-danger" href="{{ route('admin.specialites.edit', $level->id) }}" title="edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-outline-danger" href="" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <form id="delete-form" action="{{ route('admin.specialites.destroy', $level->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->


        <!-- <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter une specialites</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.specialites.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control"  name="code" placeholder="entrer un code" required>
                  </div>
                  <div class="form-group">
                    <label>Nom Specialite</label>
                    <input type="text" class="form-control"  name="nom" placeholder="entrer nom de specialite" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-success">valider</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>




      </div> -->
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
