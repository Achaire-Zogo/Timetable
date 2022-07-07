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
          <h1>Modifier les informations d'un enseignant</h1>
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
                <h3 class="card-title">Modifier une information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.enseignant.update', $enseignant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label>Matricule de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->matricule }}  name="matricule" placeholder="entrer le matricule d'un enseignant" required>
                  </div>
                  <div class="form-group">
                    <label>Titre de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->titre }}  name="titre" placeholder="entrer le titre de la enseignant" required>
                  </div>
                  <div class="form-group">
                    <label>Nom de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->nom_enseignant }}  name="nom_enseignant" placeholder="entrer un enseignant" required>
                  </div>
                  <div class="form-group">
                    <label>Prenom de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->prenom_enseignant }}  name="prenom_enseignant" placeholder="entrer le code de la enseignant" required>
                  </div>
                  <div class="form-group">
                    <label>Numero de téléphone de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->telephone }}  name="telephone" placeholder="entrer de telephone d'un enseignant" required>
                  </div>
                  <div class="form-group">
                    <label>Email de l'enseignant</label>
                    <input type="email" class="form-control"  value={{ $enseignant->email }}  name="email" placeholder="entrer l'email de enseignant" require>
                  </div>
                  <div class="form-group">
                    <label>Adresse de l'enseignant</label>
                    <input type="text" class="form-control"  value={{ $enseignant->adresse }}  name="adresse" placeholder="entrer l'adresse de enseignant" require>
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
