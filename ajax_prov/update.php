<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["rut"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE prov SET ".$_POST["column_name"]."='".$value."' WHERE rut = '".$_POST["rut"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Proveedor actualizado';
 }
}
?>
