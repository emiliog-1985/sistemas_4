<?php
// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
?>
<!-- solicitudes ---------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal bd-modal-xl" id="sol" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="row text-left">
    <div class="modal-content">
      <div class="modal-body">
      <center>
      <html>
 <head>
 <body>
<form id="formacs" name="formacs" action="../modal/procesos/procesos.php" method="post">
<h3>Nueva solicitud</h3>
</br>
<form>
<div class="container">
<div class="row">

<div class="form-group col-sm-2">
                            <p class="lead"><h6> Numero de memo</p></h6>
                            <div class="help-block with-errors"></div>
                            <input name="memo" id="memo" placeholder="Ingrese numero memo" maxlength="3" class="form-control" type="int" required data-error="Ingrese su numero de memo"> 
                          </div>
                          
<div class="form-group col-sm-3">
                            <p class="lead"><h6> Fecha solicitud</p></h6>
                            <div class="help-block with-errors"></div>
                            <input name="fsol" id="fsol" placeholder="Ingrese su fecha de solicitud" class="form-control" type="date" title="Ingrese su fecha de solicitud" required data-error="Por favor ingresa tu fecha de solicitud"> 
                          </div>

<div class="form-group col-sm-3">
                            <p class="lead"><h6> Nombre de requiriente</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="nre" id="nre" placeholder="Nombre de requirente" maxlength="30" class="form-control" type="text" required data-error="Por favor ingresar nombre requirente"> 
                          </div>

<div class="form-group col-sm-3">
                            <p class="lead"><h6> Nombre de responsable</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="nrep" id="nrep" placeholder="Nombre de responsable" maxlength="30" class="form-control" type="text" required data-error="Por favor ingresar nombre responsable"> 
                          </div>

<div class="form-group col-sm-6">
<p class="lead"><h6> Detalle de solicitud</p><h6>
<form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">

                            <div class="help-block with-errors"></div>
                            <textarea rows="3" name="deta" id="deta" placeholder="Agregue detalle de la solicitud" maxlength="500" onkeyup="countChars(this)" class="form-control" required data-error="Agregue detalle de la solicitud"></textarea>
                          </div>          
          
<div class="form-group col-sm-6">
<br><br><br>
<center>
                <button type="submit" id="submit" class="btn btn-warning btn-sm btn"><img src="../imagenes/enviar.png" width="32" height="32" />  Registrar </button>                  
                <button type="reset" id="submit" class="btn btn-warning btn-sm btn"><img src="../imagenes/borrar.png" width="32" height="32" /> Limpiar</button>
</center>        
                  </div>                

</form>                           
</select>  
 </body>
</html>      
      </center>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- solicitudes --------------------------------------------------------------------------------------------------------------------------------->