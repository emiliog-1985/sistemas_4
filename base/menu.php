<?php

// Revisando si el usuario esta iniciado, si no es asi es enviado a la pantalla de usuario
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: /sistemas_4/index.php");
    exit;
}
?>    
<nav class="navbar navbar-dark bg-dark">
<a class="navbar-text"> </h1>Bienvenido:</h1> 
<?php 
print_r($_SESSION["username"]);
?>
</a>
<div class="btn-group btn-group-sm" role="group" aria-label="...">
<a href="/sistemas_4/" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/home.png" width="32" height="32" /></button></a>
<a href="/sistemas_4/login/reset-password.php" button type="button-sm" class="btn btn-warning border-dark"><img src="../imagenes/admin.png" width="32" height="32" /></button></a>
<a href="/sistemas_4/login/logout.php" button type="button-sm" class="btn btn-danger border-dark"><img src="../imagenes/logout.png" width="32" height="32" /></button></a>
</div>
</nav>

    <div class="container">
    </br>
    <div class="row">
      <div class="col-6"><img class="d-block mx-auto mb-4"src="/sistemas_4/imagenes/disam-logo.png" alt="" width="333" height="166"></div>
      <div class="col-6"><center><h3><p class="mt-5 mb-3 text-light">Proveedores, solicitudes y recepciónes drogueria</p></h3></center></div>
    </div>
    </div>
    </body>