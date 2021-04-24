<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: index.php");
    exit;
}
 
// Include config file
require_once "../base/conexion.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err ="Estimado usuario ingresar contraceña";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location:../index.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio contraseña Ver 1.0</title>
    <link rel="stylesheet" href="../base/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        
    </style>
</head>
<body>
<body style="background-color:#0045ad;">
 <div class="container">
      <?php
      include "../base/head.php";
      ?>
        <div class="container"><center><h3><p class="text-light"> Cambio de contraseña </p></h3></center></div>
        </div>    
      </div>
</br>
<center>
<div class=container>
    <div class="wrapper">
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <p class="text-light"><label>Nueva contraseña</label></p>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
            <p class="text-light"><span class="help-block"><?php echo $new_password_err; ?></span></p>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <p class="text-light"><label>Confirmar contraseña</label></p>
                <input type="password" name="confirm_password" class="form-control">
            <p class="text-light"><span class="help-block"><?php echo $confirm_password_err; ?></span></p>
            </div>
            </br>
            <div class="btn-group">
                <input type="submit" class="btn btn-warning border-dark" value="Cambiar">
                <a class="btn btn-warning border-dark" href="../admin/index.php"><img src="../imagenes/home.png" width="24" height="24"></i></a>
            </div>
        </form>
    </center>
    </div>  
    <?php
    include "../base/footer.php";
    ?>
</body>
</html>