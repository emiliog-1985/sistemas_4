<html>
<?php
include "../base/core.php";
?>
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
		}else{
			cambio.type = "password";
		}
	} 
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#Show_Password').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
<br></br>
<div class="container">
        <div class="input-group">
      <input ID="txtPassword" type="Password" Class="form-control">
      <div class="input-group-append">
           <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">Mostrar</button>
         </div>
    </div>
    </div>
      </html>