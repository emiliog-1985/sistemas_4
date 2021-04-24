<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $nfac=$_POST['nfac'];
    $prov=$_POST['prov'];
    $ord=$_POST['ord'];
    $det=$_POST['det'];
    
    $sql="INSERT INTO fact (nfac,prov,ord,det)
      VALUES ('$nfac','$prov','$ord','$det')";  
    
   

if (mysqli_query($conn, $sql)) {

    //echo "New record created successfully";
    echo'<script type="text/javascript"> alert("Recepción ingresada"); window.location.href="../../ajax_fact/"; </script>';
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>