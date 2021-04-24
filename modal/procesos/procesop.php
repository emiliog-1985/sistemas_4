<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $rut=$_POST['rut'];
    $ndp=$_POST['ndp'];
    $ndc=$_POST['ndc'];
    $email=$_POST['email'];
    $nt=$_POST['nt'];

    $sql="INSERT INTO prov (rut,ndp,ndc,email,nt)
      VALUES ('$rut','$ndp','$ndc','$email','$nt')";  
    
if (mysqli_query($conn, $sql)) {
    echo'<script type="text/javascript"> alert("Proveedor ingresado"); window.location.href="../../ajax_prov/index.php"; </script>';
} 
else {
    echo '<script type="text/javascript"> alert("Proveedor ya registrado"); window.location.href="../../ajax_prov/index.php"; </script>';
}
mysqli_close($conn);
}

?>


