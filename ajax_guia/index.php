<html>
 <head>
  <title>Listado de facturas</title>
  <?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:/sistemas_4/index.php");
      exit;
  }
  include "../base/conexion.php";
  include "../base/menu.php";
  include "../base/core.php";
  include "../modal/guia.php";
  include "../modal/adjunta2.php";
  ?>
 </head>
 <body>
 <div class="container">
 <div id="alert_message"></div>
 </div>
 <center>
 <div class="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button" class="btn btn-warning border-dark" data-toggle="modal" data-target="#guia"><img src="../imagenes/reporte.png" width="32" height="32" /></button>
    <button type="button-sm" class="btn btn-warning border-dark" data-toggle="modal" data-target="#adj2"><img src="../imagenes/add-file.png" width="32" height="32" /></button>
    <a href="/sistemas_4/carga2" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/lupa.png" width="32" height="32" /></button></a>
</center>    
</div>
  <br></br>
    <div class="container-fluid bg-white ">
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>N° de Guia</th>
       <th>Proveedor</th>
       <th>Orden de Compra</th>
       <th>Detalles</th>
       <th></th>
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
  
  function update_data(column_name, nguia, prov, ord, det, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{column_name:column_name, nguia:nguia, prov:prov, ord:ord, det:det, value:value},
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
   var nguia = $(this).data("nguia");
   var prov = $(this).data("prov");
   var ord = $(this).data("ord")
   var det = $(this).data("det");
   var value = $(this).text();
   update_data(column_name, nguia, prov, ord, det, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable nme="data1"></td>';
   html += '<td contenteditable nme="data2"></td>';
   html += '<td contenteditable nme="data3"></td>';
   html += '<td contenteditable nme="data4"></td>';
   html += '<td><button type="button" name="insert" nme="insert" class="btn btn-success btn-xs">Agregar</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var nfac = $('#data1').text();
   var prov = $('#data2').text();
   var ord = $('#data3').text();
   var det = $('#data4').text();
   if(nfac != '' && prov != '' && ord != '' && det != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{nfac:nfac, prov:prov, ord:ord, det:det},
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
   var nguia = $(this).attr("nguia");
   if(confirm("¿Estas seguro de borrar a este guia?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{nguia:nguia},
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