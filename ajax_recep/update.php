<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["ord"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE recep SET ".$_POST["column_name"]."='".$value."' WHERE ord = '".$_POST["ord"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Recepcion actualizada';
 }
}
?>
