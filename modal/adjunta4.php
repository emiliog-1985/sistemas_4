<?php
// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
include "../base/script.php";
include "../base/core.php";
include "../base/conexion.php";
?>
<!-- Modal-proveedores --------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="adj4" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="row text-left">
    <div class="modal-content">
      <div class="modal-body">
      <html>
 <body>
<h5>Archivo de factura</h5>
</br>
<form action="../modal/procesos/carga4.php" method="post" enctype="multipart/form-data">
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<div class="container">
<center><h5>¡Solo cargar archivos PDF¡</h5></center>
<br>
<div class="row">
<div class="form-group col-sm-8">
<select name="nfac" id="nfac" placeholder="Seleccione la factura" class="form-control" type="text" required data-error="Seleccione la factura">
<option value="">Selecionar factura</option>                            
<?php
          $query = ("SELECT * FROM fact");
          $recupera=mysqli_query($conn, $query);
          while ($nfac = mysqli_fetch_array($recupera)) {
          echo '<option value="'.$nfac[nfac].'">'.$nfac[nfac].'</option>';
          }
?>
<center>
<div class="col-sm-6">
  <input type="file" name="fileToUpload" id="fileToUpload">
</div>
</center>
<div class="col-sm-4">  
  <button type="submit" id="submit" class="btn btn-warning btn-sm btn border-white"><img src="../imagenes/add-file.png" width="32" height="32" /></button>
</form>                           
</select>  
</div>
</div>
</div>
</div>
 </body>
</html>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>