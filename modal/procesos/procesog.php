<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $nguia=$_POST['nguia'];
    $prov=$_POST['prov'];
    $ord=$_POST['ord'];
    $det=$_POST['det'];

    $sql="INSERT INTO guia (nguia,prov,ord,det)
      VALUES ('$nguia','$prov','$ord','$det')";  
    
   

if (mysqli_query($conn, $sql)) {

    //echo "New record created successfully";
    echo'<script type="text/javascript"> alert("Guia ingresada"); window.location.href="../../ajax_guia/"; </script>';
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>