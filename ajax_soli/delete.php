<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nme"]))
{
 $query = "DELETE FROM soli WHERE nme = '".$_POST["nme"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'solicitud borrada';
 }
}
?>