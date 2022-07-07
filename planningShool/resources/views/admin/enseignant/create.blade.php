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
          <h1>Ajouter un enseignant</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.enseignant.index') }}">Liste enseignant</a></li>
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter un enseignant</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.enseignant.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Matricule de l'enseignant </label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="matricule" placeholder="entrer le matricule de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titre de l'enseignant</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="titre" placeholder="entrer le titre de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom de l'enseignant </label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="nom_enseignant" placeholder="entrer le nom de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prenom de l'enseignant</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="prenom_enseignant" placeholder="entrer le prenom de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telephone de l'enseignant</label>
                    <input type="number" class="form-control" id="exampleInputEmail1"  name="telephone" placeholder="entrer le numero  de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email de l'enseignant</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="entrer l'email de l'enseignant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adresse de l'enseignant</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="adresse" placeholder="entrer le prenom de l'enseignant" required>
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
