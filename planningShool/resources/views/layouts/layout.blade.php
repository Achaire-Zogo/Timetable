<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title')  | {{ config('app.name', 'Timetable') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">



  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/dropzone/min/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('toastr.css') }}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @if (Auth::check())

  <aside class="main-sidebar sidebar-orange sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TimeTable</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
   <a href="#" class="d-block">Bonjour {{ Auth::user()->name }}</a>
@endauth

        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('TimeTable.timetable.create')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Creer un emploie de temps
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.enseignant.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les enseignants
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('EnsFil.EF.create') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
             Lier un enseignant a une filiere
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.salle.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les salles
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ue.liste') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les UEs
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('classe.liste') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les classes
               <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.filiere.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les filieres
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.niveau.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les Niveaux
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Gerer les Niveaux
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.niveau.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Voir Les Niveaux</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.niveau.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer Un Niveau</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="{{route('admin.specialites.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gerer les Specialites
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Gerer les SPecialites
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.specialites.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Voir les SPecialites</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.specialites.create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer une SPecialite</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
    <!-- Content Header (Page header) -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dashboard/dist/js/pages/dashboard.js') }}"></script>



<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('toastr.js') }}"></script>


{!! Toastr::message() !!}
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End




    $('table').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButtor: true,
        progressBar: true
    });
    @endforeach
    @endif

</script>
@yield('scripts')
</body>
</html>
