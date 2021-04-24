<?php
//Iniciar la sesion
session_start();
// Si el usuario esta ingresado envia a la pagina 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
header("location:../admin/index.php");
exit;
}
// Archivo de conecxion
require_once "../base/conexion.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Compruebe si el nombre de usuario está vacío
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Compruebe si la contraseña está vacía
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar credenciales
    if(empty($username_err) && empty($password_err)){
        // Prepare una declaración selecta
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establecer parámetros
            $param_username = $username;
            
            // Intente ejecutar la declaración preparada
            if(mysqli_stmt_execute($stmt)){
                // Resultado de la tienda
                mysqli_stmt_store_result($stmt);
                
                // Verifique si existe el nombre de usuario, si es así, verifique la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vincular variables de resultado
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // La contraseña es correcta, así que inicie una nueva sesión.
                            session_start();
                            
                            // Almacenar datos en variables de sesión
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirigir al usuario a la página de bienvenida
                            header("location: ../admin/index.php");
                        } else{
                            // Muestra un mensaje de error si la contraseña no es válida
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Muestra un mensaje de error si el nombre de usuario no existe
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Declaración de cierre
        mysqli_stmt_close($stmt);
    }
    
    // Conexión cerrada
    mysqli_close($link);
}
include "../base/core.php";
include "../base/script.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio version - 1.0</title>
    <style type="text/css">
        body{ font: 14px Helvetica; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<?php
include "../base/head.php";
?>
<center>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <h4><label><p class="text-light">Usuario</p></label></h4>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"><br>
                <h5><span class="help-block"><p class="text-light"><?php echo $username_err; ?></p></span></h5>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <h4><label><p class="text-light">Contraseña</p></label></h4>
                <div class="input-group">
                <input type="Password" name="password" id="txtPassword" class="form-control">
                <div class="input-group-append">
            <button id="show_password" class="btn btn-warning" type="button" onclick="mostrarPassword()"><img src="../imagenes/eye.png" width="24" height="24"></button>
          </div>
          </div>
            </div>
            </div>
            </br></br>
            <div class="btn-group btn-group">
                <input type="submit" class="btn btn-warning" value="Ingresar" id="enviar">
            </div>
            
            </br>
            </br>
        </form>
<?php
include "../base/footer.php";
?>
</center>           
</body>
</html>