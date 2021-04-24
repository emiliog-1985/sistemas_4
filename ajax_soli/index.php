<html>
 <head>
  <title>Listado de solicitudes</title>
  <?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:/sistemas_4/index.php");
      exit;
  }
  include "../base/menu.php";
  include "../base/core.php";
  include "../modal/solicitudes.php";
  include "../modal/adjunta.php";
  ?>
 </head>
 <body>
 <div class="container">
 <div id="alert_message"></div>
 </div>
 <center>
 <div class="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button-sm" class="btn btn-warning border-dark" data-toggle="modal" data-target="#sol"><img src="../imagenes/reporte.png" width="32" height="32" /></button>
    <button type="button-sm" class="btn btn-warning border-dark" data-toggle="modal" data-target="#adj"><img src="../imagenes/add-file.png" width="32" height="32" /></button>
    <a href="/sistemas_4/carga" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/lupa.png" width="32" height="32" /></button></a>
</center>    
</div>
  <br></br>
    <div class="container-fluid bg-white ">
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Memo</th>
       <th>Fecha solicitud</th>
       <th>Nombre Requiriente</th>
       <th>Nombres Responsable</th>
       <th>Detalles</th>
       <th>Acciones</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
  </div>
  <?php
  include "../base/footer.php";
  ?>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
  }
  
  function update_data(column_name, nme, fsol, nre, nrep, deta, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{column_name:column_name, nme:nme, fsol:fsol, nre:nre, nrep:nrep, deta:deta, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var column_name = $(this).data("column");
   var nme = $(this).data("nme");
   var fsol = $(this).data("fsol");
   var nre = $(this).data("nre")
   var nrep = $(this).data("nrep");
   var deta = $(this).data("deta");
   var value = $(this).text();
   update_data(column_name, nme, fsol, nre, nrep, deta, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable nme="data1"></td>';
   html += '<td contenteditable nme="data2"></td>';
   html += '<td contenteditable nme="data3"></td>';
   html += '<td contenteditable nme="data4"></td>';
   html += '<td contenteditable nme="data5"></td>';
   html += '<td><button type="button" name="insert" nme="insert" class="btn btn-success btn-xs">Agregar</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var nme = $('#data1').text();
   var fsol = $('#data2').text();
   var nre = $('#data3').text();
   var nrep = $('#data4').text();
   var deta = $('#data5').text();
   if(nme != '' && fsol != '' && nre != '' && nrep != '' && deta != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{nme:nme, fsol:fsol, nre:nre, nrep:nrep, deta:deta},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Se debe llenar todos los datos");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var nme = $(this).attr("nme");
   if(confirm("¿Estas seguro de borrar a este proveedor?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{nme:nme},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>