<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nfac"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE fact SET ".$_POST["column_name"]."='".$value."' WHERE nfac = '".$_POST["nfac"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Factura actualizada';
 }
}
?>
