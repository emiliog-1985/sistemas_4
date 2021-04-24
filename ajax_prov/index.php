<html>
 <head>
  <title>Listado de proveedores</title>
  <?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:/sistemas_4/index.php");
      exit;
  }
  include "../base/menu.php";
  include "../base/core.php";
  include "../modal/proveedor.php";
  ?>
 </head>
 <body>
 <div class="containe">
 <div id="alert_message"></div>
 </div>
   <br></br>
   <center>
   <div class="btn-group btn-group-sm" role="group">
   <button type="button" class="btn btn-warning border-dark" data-toggle="modal" data-target="#prov"><img src="../imagenes/add-user.png" width="32" height="32" /></button>
    </div>
  </center>
    <br></br>
    <div class="container-fluid bg-light">
    <table id="user_data" class="table table-bordered table-light .text-light table-striped table-sm">
     <thead>
      <tr>
       <th>R.U.T</th>
       <th>Nombre de proveedor</th>
       <th>Nombre de contacto</th>
       <th>Correo electronico</th>
       <th>Numero telefonico</th>
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
  
  function update_data(column_name, rut, ndp, ndc, email, nt,  value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{column_name:column_name, rut:rut, ndp:ndp, ndc:ndc, email:email, nt:nt, value:value},
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
   var rut = $(this).data("rut");
   var ndp = $(this).data("ndp");
   var ndc = $(this).data ("ndc");
   var email = $(this).data("email")
   var nt = $(this).data("nt");
   var value = $(this).text();
   update_data(column_name, rut, ndp, ndc, email, nt, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Agregar</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var rut = $('#data1').text();
   var ndp = $('#data2').text();
   var ndc = $('#data3').text();
   var email = $('#data4').text();
   var nt = $('#data5').text();
   if(rut != '' && ndp != '' && ndc != '' && email != '' && nt != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{rut:rut, ndp:ndp, ndc:ndc, email:email, nt:nt},
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
   var rut = $(this).attr("rut");
   if(confirm("¿Estas seguro de borrar a este proveedor?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{rut:rut},
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