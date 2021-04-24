<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nguia"]))
{
 $query = "DELETE FROM guia WHERE nguia = '".$_POST["nguia"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Guia borrada';
 }
}
?>