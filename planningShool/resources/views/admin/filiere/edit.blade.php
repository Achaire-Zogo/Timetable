@section('title')
step1
@endsection
@extends('layouts.layout')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Modifier une Filière</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.filiere.index') }}">Liste filières</a></li>

            <li class="breadcrumb-item active">Filière</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modifier une Filière</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.filiere.update', $filiere->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label>Filiere</label>
                    <input type="text" class="form-control"  value={{ $filiere->nom_filiere }}  name="nom_filiere" placeholder="entrer une filiere" required>
                  </div>
                  <div class="form-group">
                    <label>Code de la Filiere</label>
                    <input type="text" class="form-control"  value={{ $filiere->code_filiere }}  name="code_filiere" placeholder="entrer le code de la filiere" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-success">valider</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

      </div>
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
