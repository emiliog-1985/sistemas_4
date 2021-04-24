<!doctype html>
<html>
<title>Archivos</title>
<?php
// Inicio de sesion
session_start();
// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location:/sistemas_4/index.php");
    exit;
  }    
include "../base/menu.php";  
include "../base/core.php";
include "../base/script.php";
?>
<body>
<center>
<div class="btn-group btn-group-sm" role="group" aria-label="...">
<a href="/sistemas_4/ajax_nota/" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/atras.png" width="32" height="32" /></button></a>
</div>
<br></br>
</center>
<div class="container-fluid bg-white ">
  <table id="data" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>N°</th>
      <th>Nota</th>
      <th>Ver</th>
      <th>Descargar</th>
      <th>Eliminar</th>
    </tr>
  </thead>    
<?php
$archivos = scandir("subidas");
$num=0;
for ($i=2; $i<count($archivos); $i++)
{$num++;
?>
<p>  
 </p>       
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $archivos[$i]; ?></td>
      <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" open="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"><button type="button" class="btn btn-warning"><img src="../imagenes/eye.png" width="32" height="32" /></button></a></td>
      <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"><button type="button" class="btn btn-warning"><img src="../imagenes/descarga.png" width="32" height="32" /></button></a></td>
      <td><a title="Eliminar Archivo" href="Eliminar.php?name=subidas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"><button type="button" class="btn btn-danger"><img src="../imagenes/delete.png" width="32" height="32" /></button></a></td>
    </tr>
 <?php }
 ?> 
 </div>
<!-- Fin tabla-->
</html>
</body>
