<?php
require_once "../../base/conexion.php";
// Check connection
if (!$conn) {
    die("Conecxion fallida" . mysqli_connect_error());
}
else{
    $memo=$_POST['memo'];
    $fsol=$_POST['fsol'];
    $nre=$_POST['nre'];
    $nrep=$_POST['nrep'];
    $deta=$_POST['deta'];

    $memo=$_POST['memo'];
    $year = date("Y");
    $nme = $memo.'-'.$year;

    $sql="INSERT INTO soli (nme,fsol,nre,nrep,deta)
      VALUES ('$nme','$fsol','$nre','$nrep','$deta')";  
    
   

if (mysqli_query($conn, $sql)) {

    //echo "New record created successfully";
    echo'<script type="text/javascript"> alert("Proveedor ingresado"); window.location.href="../../ajax_soli/"; </script>';
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>