<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nguia"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE guia SET ".$_POST["column_name"]."='".$value."' WHERE nguia = '".$_POST["nguia"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Guia actualizada';
 }
}
?>
