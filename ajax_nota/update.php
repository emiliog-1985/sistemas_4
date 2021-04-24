<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nota"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE nota SET ".$_POST["column_name"]."='".$value."' WHERE nota = '".$_POST["nota"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Nota actualizada';
 }
}
?>
