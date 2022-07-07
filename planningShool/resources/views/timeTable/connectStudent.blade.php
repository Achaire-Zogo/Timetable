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
            <h3 class="card-title">Selectionez la filiere et le niveau</h3>

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
          <form id="form" method="GET" action="{{ route('displayTTStud') }}">
                        @csrf
            <div class="row">
             
      
              <div class="col-md-6">
              <div class="form-group">
                  <label>Filiere</label>
                  <select onchange="serachSpec()" name="filiere" class="form-control select2" id="course" data-placeholder="Select a course" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  <option value=""></option>
                  @foreach($filiere as $course)  
                  <option value="{{$course->id}}">{{$course->nom_filiere}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group" id="niv">
                  <label>Niveau</label>
                  
                    <select onchange="serachSpec()" name="niveau" class="select2" id="level" data-placeholder="Select a level" data-dropdown-css-class="select2-purple" style="width: 100%;" >
                    <option value=""></option>
                    @foreach($niveau as $level)  
                  <option value="{{$level->id}}">{{$level->nom_niveau}}</option>
                  @endforeach
                    </select>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <button id="submit" type="submit" class="btn btn-block btn-primary">Suivant</button>
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
              <div class="col-12 col-sm-6">
               
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
               
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
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

 function serachSpec(){

    $('#spec').remove(),
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              jQuery.ajax({
                  url: "{{ url('/searchSpec') }}",
                  method: 'post',
                  data: {
                     filiere: jQuery('#course').val(),
                     niveau: jQuery('#level').val(),
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                    var spec= (result.spec);
                   
                   if (spec.length>0) {

 $("    <div class=\"form-group\" ><label>Specialite</label>  <select data-dropdown-css-class=\"select2-purple\" name=\"spec\"  class=\"selectSpec form-control select2\" id= \"spec\" style=\"width: 100%;\"> <option value=\"\" disabled selected hidden>Specialite</option> <option value=\"1\" >Toutes les specialites</option> </select><div>").insertAfter("#niv");                 
                    $.each(spec, function(key,value)
                    {
                    $("#spec").append(new Option(value.nom_specialite,  value.id));
                  
                    });
                   
                    } else {
                        $("    <div class=\"form-group\" hidden ><label>Specialite</label>  <select data-dropdown-css-class=\"select2-purple\" name=\"spec\"  class=\"selectSpec form-control select2\" id= \"spec\" style=\"width: 100%;\"> <option value=\"1\" disabled selected hidden>Tronc commun</option> </select><div>").insertAfter("#niv");                 
 
                    }
                 
                 
                  }}); 
           
          }
        
</script>
        @endsection 