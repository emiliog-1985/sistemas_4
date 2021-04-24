<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $nota=$_POST['nota'];
    $prov=$_POST['prov'];
    $ord=$_POST['ord'];
    $det=$_POST['det'];

    $sql="INSERT INTO nota (nota,prov,ord,det)
      VALUES ('$nota','$prov','$ord','$det')";  
    
   

if (mysqli_query($conn, $sql)) {

    //echo "New record created successfully";
    echo'<script type="text/javascript"> alert("Nota ingresada"); window.location.href="../../ajax_nota/"; </script>';
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>