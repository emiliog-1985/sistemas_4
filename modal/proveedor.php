<?php
// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
include "../base/script.php";
include "../base/core.php";
?>
<!-- Modal-proveedores --------------------------------------------------------------------------------------------------------------------------------->
<div class="modal bd-modal-xl" id="prov" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="row text-left">
    <div class="modal-content">
      <div class="modal-body">
      <center>
      <html>
 <body>
<h3>Nuevo proveedor</h3>
</br>
<form id="formacc" name="formacc" action="../modal/procesos/procesop.php" method="post">
<div class="container">
<div class="row">

<div class="form-group col-sm-4">
                            <p class="lead" text-light ><h6> R.U.T</p></h6>
                            <div class="help-block with-errors"></div>
                            <input name="rut" id="rut" placeholder="Ingrese rol unico tributario " class="form-control" type="text" required oninput="checkRut(this)" maxlength="10" minlength="9">
                            </div>

<div class="form-group col-sm-4">
                            <p class="lead"><h6> Nombre de proveedor</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="ndp" id="ndp" placeholder="Ingrese nombre de proveedor" maxlength="30" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>
                          
<div class="form-group col-sm-4">
<p class="lead"><h6> Nombre de contacto</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="ndc" id="ndc" placeholder="Ingrese nombre de contacto" maxlength="30" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>

<div class="form-group col-sm-4">
<p class="lead"><h6> Correo electronico</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="email" id="email" placeholder="Contacto@empresa.cl" maxlength="30" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>

<div class="form-group col-sm-4">
<p class="lead"><h6> Numero telefonico</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="nt" id="nt" placeholder="Numero telefonico" maxlength="9" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>                          
<div class="form-group col-sm-4">
</br></br>
<center>
<div class="btn-group" role="group">
<button type="submit" id="submit" class="btn btn-warning btn-sm btn border-white"><img src="../imagenes/enviar.png" width="32" height="32" />  Registrar </button>             
<button type="reset" id="submit" class="btn btn-warning btn-sm btn border-white"><img src="../imagenes/borrar.png" width="32" height="32" /> Limpiar</button>
</center>    
</div>
</div>
</form>                           
</select>  
</div>
 </body>
</html>      
      </div>
      </center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>