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
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Etape 1</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Etape 1</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Selectionez l'enseignant et la filiere</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
          <form id="form" method="POST" action="{{ route('EnsFil.EF.store') }}">
                        @csrf
            <div class="row">
             
      
              <div class="col-md-6">
              <div class="form-group">
                  <label>Enseignant</label>
                  <select  name="enseignant" class="form-control select2" id="ens" data-placeholder="Select a course" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  <option value=""></option>
                  @foreach($enseignant as $ens)  
                  <option value="{{$ens->id}}">{{$ens->nom_enseignant}} {{$ens->prenom_enseignant}}</option>
                  @endforeach
                  </select>
                </div>
</div>
<div class="col-md-6">
                <div class="form-group" id="niv">
                  <label>Filiere</label>
                  <select name="filiere" class="form-control select2" id="course" data-placeholder="Select a course" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  <option value=""></option>
                  @foreach($filiere as $course)  
                  <option value="{{$course->id}}">{{$course->nom_filiere}}</option>
                  @endforeach
                  </select>
              </div></div>
              <!-- /.col -->
              <div class="col-md-6">
              <button id="submit" type="submit" class="btn btn-block btn-primary">Save</button>
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

</div>
           
</form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           
          </div>
        </div>
        <!-- /.card -->

     
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        @endsection

      @section('scripts')
<script>

        
</script>
        @endsection 