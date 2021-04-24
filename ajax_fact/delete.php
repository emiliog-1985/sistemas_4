<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nfac"]))
{
 $query = "DELETE FROM fact WHERE nfac = '".$_POST["nfac"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Factura borrada';
 }
}
?>