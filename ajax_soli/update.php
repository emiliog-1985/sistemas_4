<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nme"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE soli SET ".$_POST["column_name"]."='".$value."' WHERE nme = '".$_POST["nme"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Solicitud actualizada';
 }
}
?>
