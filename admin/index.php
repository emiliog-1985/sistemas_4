<!doctype html>
<head>
<html lang="es">
<meta charset="utf-8">
<title>Admin-DISAM - 1.0</title>
</head>
<?php
// Inicio de sesion
session_start();
// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location:/sistemas_4/index.php");
    exit;
}
require_once "../base/conexion.php";
include "../base/menu.php";
include "../modal/proveedor.php";
include "../modal/solicitudes.php";
include "../modal/recepcion.php";
include "../modal/facturas.php";
include "../base/core.php";
?>
   <!--botones-->
   
    <div class='container'>
    </br>
    <center>
    <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <h4><p class="text-light ">Panel</p></h4>
    </br>
    <div class='container'>
    <div class="btn-group btn-group-md" role="group">
    <a href="/sistemas_4/ajax_prov" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/agenda.png" width="32" height="32" /> Proveedores</button></a>
    <a href="/sistemas_4/ajax_soli" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/reporte.png" width="32" height="32" /> Solicitudes</button></a>
    </div>
    <div class='container'>
    <div class="btn-group btn-group-md" role="group">
    <a href="/sistemas_4/ajax_recep" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/box.png" width="32" height="32" /> Recepciones</button></a>
    </div>
    <div class='container'>
    <div class="btn-group btn-group-md" role="group">
    <a href="/sistemas_4/ajax_guia" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/nota.png" width="32" height="32" /> Guias</button></a>
    <a href="/sistemas_4/ajax_nota" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/nota.png" width="32" height="32" /> Notas</button></a>
    <a href="/sistemas_4/ajax_fact" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/factura.png" width="32" height="32" /> Facturas</button></a>
    </div>
    </div>
    </br></br></br>
    </center>
    </div>   
   <!-- footer -->
<?php
include "../base/footer.php";
?>
</html>
</body>