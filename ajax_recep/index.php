<html>
 <head>
  <title>Recepciones</title>
  <?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:/sistemas_4/index.php");
      exit;
  }
  include "../base/conexion.php";
  include "../base/menu.php";
  include "../base/core.php";
  include "../modal/recepcion.php";
  ?>
 </head>
 <body>
 <div class="container">
 <div id="alert_message"></div>
 </div>
   </br>
   <center>
    <div class ="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button" class="btn btn-warning border-dark" data-toggle="modal" data-target="#rec"><img src="../imagenes/box.png" width="32" height="32" /></button>
    </div>
    </center>
    </br>
    <div class="container-fluid bg-light ">
    <table id="user_data" class="table table-bordered table-ligh .text-light table-striped table-sm">
     <thead>
      <tr>
       <th>Ord.compra</th>
       <th>Acta</th>
       <th>Proveedor</th>
       <th>Monto</th>
       <th>Fecha factura</th>
       <th>Fecha recepcion</th>
       <th>Observaciones</th>
       <th>Acciones</th>
      </tr>
     </thead>
    </table>
  <?php
  include "../base/footer.php";
  ?>
 </body>
</html>
</div>

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
  
  function update_data(ord, column_name, acta, prov, mt, fef, frfm, detar, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{ord:ord, column_name:column_name, acta:acta, prov:prov, mt:mt, fef:fef, frfm:frfm, detar:detar, value:value},
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
   var ord = $(this).data("ord");
   var column_name = $(this).data("column");
   var acta = $(this).data("acta");
   var prov = $(this).data("prov");
   var mt = $(this).data("mt");
   var fef = $(this).data("fef");
   var frfm = $(this).data("frfm");
   var detar = $(this).data("detar");
   var value = $(this).text();
   update_data(ord, column_name, acta, prov, mt, fef, frfm, detar, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td contenteditable id="data9"></td>';
   html += '<td contenteditable id="data10"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Agregar</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var ord = $('#data1').text();
   var acta = $('#data2').text();
   var prov = $('#data3').text();
   var mt = $('#data4').text();
   var fef = $('#data5').text();
   var frfm = $('#data6').text();
   if(ord != '' && acta != '' && prov != '' && mt != '' && fef != '' && frfm != '' && detar != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{ord:ord, acta:acta, prov:prov, mt:mt, fef:fef, frfm:frfm, detar:detar},
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
   var ord = $(this).attr("ord");
   if(confirm("¿Estas seguro de borrar a este proveedor?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{ord:ord},
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