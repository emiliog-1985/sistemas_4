<?php

// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
?>
<!-- recepciones --------------------------------------------------------------------------------------------------------------------------------->
<div class="modal bd-modal-xl" id="rec" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="row text-left">
    <div class="modal-content">
      <div class="modal-body">
      <center>
      <html>
 <body>
<h3>Recepción</h3>
<form id="formacr" name="formacr" action="../modal/procesos/procesor.php" method="post">
</br>
<form>
<div class="container">
<div class="row">
  
<div class="form-group col-sm-3">
                            <p class="lead"><h6> N° de orden de compra</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="ord" id="ord" placeholder="xxx-xxx-xxxx" maxlength="13" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>

<div class="form-group col-sm-3">
                            <p class="lead"><h6>Acta</p></h6>
                            <div class="help-block with-errors"></div>
                            <select name="acta" id="acta" placeholder="Seleccione acta" class="form-control" type="text" required data-error="Seleccione tipo de solicitud">
                              <option value="">Acta</option>
                              <option value="No ingresada">No ingresada</option>
                            
                              <?php
          $query = ("SELECT * FROM soli");
          $recupera2=mysqli_query($conn, $query);
          while ($nme = mysqli_fetch_array($recupera2)) {
          echo '<option value="'.$nme[nme].'">'.$nme[nme].'</option>';
          }
          ?>
                            
                            </select>  
                            </div>

<div class="form-group col-sm-3">
                            <p class="lead"><h6>Proveedor</p></h6>
                            <div class="help-block with-errors"></div>
                            <select name="prov" id="prov" placeholder="Seleccione al proveedor" class="form-control" type="text" required data-error="Seleccione tipo de solicitud">
                              <option value="">Proveedor</option>
                            
                              <?php
          $query = ("SELECT * FROM prov");
          $recupera=mysqli_query($conn, $query);
          while ($ndp = mysqli_fetch_array($recupera)) {
          echo '<option value="'.$ndp[ndp].'">'.$ndp[ndp].'</option>';
          }
          ?>
                            
                            </select>  
                            </div>

<div class="form-group col-sm-3">
                            <p class="lead"><h6>Monto</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="mt" id="mt" placeholder="Ingresar" maxlength="10" class="form-control" type="text" required data-error="Por favor ingresar solo numeros"> 
                          </div>  

<div class="form-group col-sm-3">
                            <p class="lead"><h6> Fecha emision de factura</p></h6>
                            <div class="help-block with-errors"></div>
                            <input name="fef" id="fef" placeholder="Ingrese fecha " class="form-control" type="date" title="Ingrese su fecha de solicitud" required data-error="Por favor ingresa tu fecha de solicitud"> 
                          </div>                          

<div class="form-group col-sm-3">
                            <p class="lead"><h6> Fecha Recepción mercaderia</p></h6>
                            <div class="help-block with-errors"></div>
                            <input name="frfm" id="frfm" placeholder="Ingrese fecha" class="form-control" type="date" title="Ingrese su fecha de solicitud" required data-error="Por favor ingresa tu fecha de solicitud"> 
                          </div>   
                          
<div class="form-group col-sm-6">
<p class="lead"><h6> Observaciones</p></h6>
<form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
                            <div class="help-block with-errors"></div>
                            <textarea rows="3" name="detar" id="detar" placeholder="Agregue observacion" maxlength="500" onkeyup="countChars(this)" class="form-control" required data-error="Agregue detalle de la observacion"></textarea>
                          </div>

<div class="form-group col-sm-6">
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
<!-- recepciones --------------------------------------------------------------------------------------------------------------------------------->