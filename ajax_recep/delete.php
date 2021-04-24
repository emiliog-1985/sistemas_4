<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["ord"]))
{
 $query = "DELETE FROM recep WHERE ord = '".$_POST["ord"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Recepcion Borrada';
 }
}
?>