@section('title')
step2
@endsection
@extends('layouts.layout')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emploie de temps {{$filiere}} {{$niveau}} </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Emploie de temps {{$filiere}} {{$niveau}} </li>
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
              <div  class="card-header">
                <h3 class="card-title">Remplisser le tableau</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Heures/Jours</th>
                    @foreach($jour as $days)  
                    <th>{{$days->intitule}}</th>
                     @endforeach
                    
                    </tr>
                  </thead>
                  <tbody>
                  @php
                     
                     
                      $j=0;
                      @endphp
                      @foreach($heure as $hour)  
                      <tr >
                      <td >{{$hour->plage_horaire}}</td>
                      @foreach($jour as $day)  
                      @php
                      $type=0;
                      $ues=0;
                      $ens=0;
                     
                      
                      @endphp
                      @foreach($existant as $ex)
                      
                      @if($ex->id_jour==$day->id && $ex->id_heure==$hour->id)
                      @php
                        $type=$ex->id_type;
                        $ues=$ex->id_ue;
                        $ens=$ex->id_enseignant;

                        @endphp
                        @endif
                        @endforeach

                      <td id="case{{$j}}"   >
                          <select onchange="selectedType({{$j}})" class="select2 TypeSelected" name="TypeSelected" id="TypeSelected{{$j}}" data-placeholder="Type de cours" style="width: 100%;">
                     <option value=""></option>
                      @foreach($type_cours as $TC)
                      @if($TC->id == $type)
                    <option selected value="{{$TC->id}}">{{$TC->type}}</option>
                    @else
                    <option value="{{$TC->id}}">{{$TC->type}}</option>
                    @endif
                 
                    @endforeach 
                  <!--  <option value="1">CM</option>
                    <option selected value="2">TD</option> -->
                  </select>

                      <select onchange="selectedUE({{$j}})" class="select2 UESelected" name="UESelected" id="UESelected{{$j}}" data-placeholder="UE" style="width: 100%;">
                      <option value=""></option>
                      @foreach($UE as $ue)
                      @if($ue->id == $ues)
                    <option selected value="{{$ue->id}}">{{$ue->id}} {{$ue->code_ue}}-{{$ue->nom_ue}}</option>
                 @else
                 <option  value="{{$ue->id}}">{{$ue->id}} {{$ue->code_ue}}-{{$ue->nom_ue}}</option>
               @endif
                    @endforeach
                  </select>


         

                  <select class="select2 TeacherSelected" id="TeacherSelected{{$j}}" data-placeholder="Enseignant" style="width: 100%;">
                  <option value=""></option>
                  @foreach($enseignant as $teacher)
                  @php 
                  $exists=0 
                  @endphp
                  @foreach($faireCours as $class)
                  @if($class->id_enseignant==$teacher->id && $class->id_ue!=$ues && $class->id_heure==$hour->id && $class->id_jour==$day->id)
                  @php 
                  $exists=1
                  @endphp
                   @endif
                   @endforeach
                    @if($exists==0)
                    @if($teacher->id == $ens)
                    <option selected value= "{{$teacher->id}}">{{$teacher->titre}} {{$teacher->nom_enseignant}} {{$teacher->prenom_enseignant}}</option>
                    @else
                    <option  value= "{{$teacher->id}}">{{$teacher->titre}} {{$teacher->nom_enseignant}} {{$teacher->prenom_enseignant}}</option>
                   
                    @endif
                    @endif 
                    @endforeach
                  </select>
                 
                  <button type="button" onclick="vider({{$j}})" class="btn btn-xs btn-warning">vider</button>

               
                      </td>
                      @php 
                  $j++;
                  @endphp
                 
                      @endforeach
</tr>

@endforeach   
                     
                      
                     
                  </tbody>
                </table>
                <div class="col-md-3">
                <button type="button" onclick="delEx(0)" class="btn btn-block btn-secondary">Enregistrer</button>
                <button type="button" onclick="delEx(1)" class="btn btn-block btn-primary">Enregistrer et publier</button>
</div>
              </div>
              <!-- /.card-body -->
              
            </div>
</div>
</div>
</div>
</section>
@endsection
@section('scripts')
<script>



 $(window).on('load',function (){
  var arr= [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34];
$.each (arr, function(i,value) {
  if (($("#TypeSelected"+i)).val()!="") {
    selectedUE(i);
selectedGroup(i); 
  }
  else{

  }

})

 });
           function selectedUE(i){
            var heure= 0;
var jour=0;
if (i>=0 && i<7) {
  heure=1;
  jour=i+1;
}
if (i>=7 && i<14) {
  heure=2;
  jour=(i-7)+1;
}
if (i>=14 && i<21) {
  heure=3;
  jour=(i-14)+1;
}
if (i>=21 && i<28) {
  heure=4;
  jour=(i-21)+1;
}
if (i>=28 && i<35) {
  heure=5;
  jour=(i-28)+1;
}
          
              (($("#selectHall"+i)).remove());
              (($("#selectGroup"+i)).remove());
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              jQuery.ajax({
                  url: "{{ url('/selectedUE') }}",
                  method: 'post',
                  data: {
                     UE: jQuery('.UESelected:eq('+i+')').val(),
                     heure:heure,
                     jour:jour,
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                    var group= (result.groupe);
                    var exGrp= (result.grpActuelle);
                   if (group.length>1) {

 $("  <select onchange=\"selectedGroup("+i+")\" id=\"selectGroup" +i+ "\" class=\"selectGroup\"  style=\"width: 100%;\"> <option value=\"\" disabled selected hidden>Groupe</option> </select>").insertAfter(".TeacherSelected:eq("+i+")");                 
 if (exGrp!=null) {
  $.each(group, function(key,value)
                    {
                        if (value.id==exGrp.id) {                  
  $("#selectGroup"+i).append("<option selected value=\""+value.id+"\">"+value.nom_groupe+"</option>");
                    
            }
            else{
              $("#selectGroup"+i).append("<option  value=\""+value.id+"\">"+value.nom_groupe+"</option>");
            
            }});
            selectedGroup(i);          
                      }
                      
                      else{
                        $.each(group, function(key,value){
                        $("#selectGroup"+i).append("<option  value=\""+value.id+"\">"+value.nom_groupe+"</option>");
                 
                      });
    
                    }
                   
                    } else {
                      
 $("  <select hidden  class=\"selectGroup\" id=\"selectGroup"+i+ "\" style=\"width: 100%;\"> </select>").insertAfter(".TeacherSelected:eq("+i+")");                 
                    $.each(group, function(key,value)
                    {
                     
                      $("#selectGroup"+i).append(new Option(value.nom_groupe,  value.id));
                  
                    });
                  
                    selectedGroup(i);
                    }
                 
                  }}); 
            }

       
function selectedGroup(i){
  var heure= 0;
var jour=0;
if (i>=0 && i<7) {
  heure=1;
  jour=i+1;
}
if (i>=7 && i<14) {
  heure=2;
  jour=(i-7)+1;
}
if (i>=14 && i<21) {
  heure=3;
  jour=(i-14)+1;
}
if (i>=21 && i<28) {
  heure=4;
  jour=(i-21)+1;
}
if (i>=28 && i<35) {
  heure=5;
  jour=(i-28)+1;
}
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              jQuery.ajax({
                  url: "{{ url('/selectedGroup') }}",
                  method: 'post',
                  data: {
                     Grp: jQuery("#selectGroup"+i).val(),
                    heure:heure,
                    jour:jour,
                    ue:jQuery("#UESelected"+i).val(),
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                    var hall= (result.hall);
                    var exSalle= result.salleActuelle;
                    
                    (($("#nb_etud"+i)).remove());
                    $("<p>  <span class=\"badge badge-info right nb_etud\" id=\"nb_etud"+i+ "\" >Nombre d'etudiants = " +result.nb_etud+"</span></p>").insertAfter(".TypeSelected:eq("+i+")");                 
                    

 $("  <select   class=\"selectHall\" id=\"selectHall"+i+ "\"  style=\"width: 100%;\"> <option value=\"\" disabled selected hidden>Salle</option> </select>").insertAfter("#selectGroup"+i);                 
                    $.each(hall, function(key,value)
                    {
                      if (exSalle!=null) {
                        
                      
                      if (value.id==exSalle.id) {
              
                      $("#selectHall"+i).append("<option selected value=\""+value.id+"\">"+value.nom_salle+"</option>");
                            
                    }
                    else{
                      $("#selectHall"+i).append("<option  value=\""+value.id+"\">"+value.nom_salle+"</option>");
                    
                    }}
                    else{
                      $("#selectHall"+i).append("<option  value=\""+value.id+"\">"+value.nom_salle+"</option>");
                     
                    }
                    });
              
                  }}); 
  
}
function selectedType(i){
 
}
function vider(i){
$("#UESelected0").val("");
$("#selectHall0").val("");

}
function delEx(x) {
  
  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

              jQuery.ajax({
                  url: "{{ url('/delEx') }}",
                  method: 'post',
                  data: {
                   
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                   save(x);
              
                  }}); 
}
function save(x){
  var arr= [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34];
$.each (arr, function(i,value) {
 if ($("#UESelected"+i).val()!="" && $("#TypeSelected"+i).val()!="" && $("#selectHall"+i).val()!="" && $("#TeacherSelected"+i).val()!="" && $("#selectGroup"+i).val()!="" ) {
 //alert("hello");
 /*console.log(jQuery("#UESelected"+i).val());
 console.log(jQuery("#TypeSelected"+i).val());
 console.log(jQuery("#selectHall"+i).val());
 console.log(jQuery("#TeacherSelected"+i).val());
 console.log(jQuery("#selectGroup"+i).val());*/
 var visGrp=0;
 if ($("#selectGroup"+i).is(":visible")==true) {
   visGrp= 1;
 }

var heure= 0;
var jour=0;
if (i>=0 && i<7) {
  heure=1;
  jour=i+1;
}
if (i>=7 && i<14) {
  heure=2;
  jour=(i-7)+1;
}
if (i>=14 && i<21) {
  heure=3;
  jour=(i-14)+1;
}
if (i>=21 && i<28) {
  heure=4;
  jour=(i-21)+1;
}
if (i>=28 && i<35) {
  heure=5;
  jour=(i-28)+1;
}

  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

              jQuery.ajax({
                  url: "{{ url('/saveCours') }}",
                  method: 'post',
                  data: {
                    VisGrp: visGrp,
                    Jour: jour ,
                    published:x,
                   Heure: heure,
                    UE: jQuery("#UESelected"+i).val(),
                    Type: jQuery("#TypeSelected"+i).val(),
                    Hall: jQuery("#selectHall"+i).val(),
                    Teacher: jQuery("#TeacherSelected"+i).val(),
                     Grp: jQuery("#selectGroup"+i).val(),
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                   
                      location.reload();
                    
                 
              
                  }}); 
 }
  else{
   console.log("humm"+i);
  }
})
}

          



  /* jQuery(document).ready(function(){

               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              jQuery.ajax({
                  url: "{{ url('/selectedUE') }}",
                  method: 'post',
                  data: {
                     UE: jQuery('.UESelected:eq(0)').val(),
                     _token: '{!! csrf_token() !!}'
                  }, 
                  success: function(result){
                    var group= (result.groupe);
                   
                   if (group.length>1) {
$select= "<select> </select>";
//$("#case").find("select:last").css("display","block");
 $("  <select   class=\"selectGroup\"  style=\"width: 100%;\"> <option value=\"\" disabled selected hidden>Groupe</option> </select>").insertAfter(".TeacherSelected:eq(0)");                 
                    $.each(group, function(key,value)
                    {
                    $(".selectGroup:eq(0)").append(new Option(value.nom_groupe,  value.id));
                  
                    });
                   
                    } else {
                      //$("#case").find("select:last").hide ();
                    }
                 
                 
                  }}); 
           
          });
        */
</script>
        @endsection 