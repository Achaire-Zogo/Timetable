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
          <form method="GET" action="{{ route('createTTStep2') }}">
                        @csrf
            <div class="row">
             
      
              <div class="col-md-6">
              <div class="form-group">
                  <label>Filiere</label>
                  <select name="filiere" class="form-control select2" id="course" data-placeholder="Select a course" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  @foreach($filiere as $course)  
                  <option value="{{$course->id}}">{{$course->nom_filiere}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Niveau</label>
                  
                    <select name="niveau" class="select2" data-placeholder="Select a level" data-dropdown-css-class="select2-purple" style="width: 100%;" >
                    @foreach($niveau as $level)  
                  <option value="{{$level->id}}">{{$level->nom_niveau}}</option>
                  @endforeach
                    </select>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <button type="submit" class="btn btn-block btn-primary">Suivant</button>
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

     <!--    @section('scripts')
<script>

function loadLevels() {
    var courseId = $('#course option:selected').val(); //Set id to 0 so you will get all records on page load.
    var request = function () {
    $.ajax({
        type: 'get',
        url: "/loadLevels",
        data: { id: courseId }, //Add request data
        dataType: 'json',
        success: function (reponse) {
          alert(reponse.name) ;
        }, error: function (e) {
            console.log("humm");
        }
    });
    };
   setInterval(request, 1000);
}
</script>
        @endsection -->