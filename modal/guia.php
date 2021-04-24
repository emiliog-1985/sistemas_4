<?php

// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
?>
<!-- recepciones --------------------------------------------------------------------------------------------------------------------------------->
<div class="modal bd-modal-xl" id="guia" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="row text-left">
    <div class="modal-content">
      <div class="modal-body">
      <center>
      <html>
 <body>
<h3>Nueva guia</h3>
<form id="formacg" name="formacg" action="../modal/procesos/procesog.php" method="post">
</br>
<form>
<div class="container">
<div class="row">
  
<div class="form-group col-sm-4">
                            <p class="lead"><h6> N° de guia</p><h6>
                            <div class="help-block with-errors"></div>
                            <input name="nguia" id="nguia" placeholder="Guia" maxlength="13" class="form-control" type="text" required data-error="Por favor ingresar"> 
                          </div>

<div class="form-group col-sm-4">
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

                            <div class="form-group col-sm-4">
                            <p class="lead"><h6>Orden de compra</p></h6>
                            <div class="help-block with-errors"></div>
                            <select name="ord" id="ord" placeholder="Seleccione orden de compra" class="form-control" type="text" required data-error="Seleccione tipo de solicitud">
                              <option value="">Orden de compra</option>
                            
                              <?php
          $query = ("SELECT * FROM recep");
          $recupera=mysqli_query($conn, $query);
          while ($ord = mysqli_fetch_array($recupera)) {
          echo '<option value="'.$ord[ord].'">'.$ord[ord].'</option>';
          }
          ?>
                            </select>  
</div> 

<div class="form-group col-sm-6">
<p class="lead"><h6> Observaciones</p></h6>
<form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
                            <div class="help-block with-errors"></div>
                            <textarea rows="3" name="det" id="det" placeholder="Agregue observacion" maxlength="500" onkeyup="countChars(this)" class="form-control" required data-error="Agregue detalle de la observacion"></textarea>
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
<!-- recepciones --------------------------------------------------------------------------------------------------------------------------------->