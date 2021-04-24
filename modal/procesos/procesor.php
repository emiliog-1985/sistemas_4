<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $ord=$_POST['ord'];
    $acta=$_POST['acta'];
    $prov=$_POST['prov'];
    $mt=$_POST['mt'];
    $fef=$_POST['fef'];
    $frfm=$_POST['frfm'];
    $detar=$_POST['detar'];

    $sql="INSERT INTO recep (ord,acta,prov,mt,fef,frfm,detar)
      VALUES ('$ord','$acta','$prov','$mt','$fef','$frfm','$detar')";  
    
   

if (mysqli_query($conn, $sql)) {

    //echo "New record created successfully";
    echo'<script type="text/javascript"> alert("Recepción ingresada"); window.location.href="../../ajax_recep/"; </script>';
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>