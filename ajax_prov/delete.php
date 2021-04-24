<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["rut"]))
{
 $query = "DELETE FROM prov WHERE rut = '".$_POST["rut"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Proovedor borrado';
 }
}
?>