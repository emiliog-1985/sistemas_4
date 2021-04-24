<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nota"]))
{
 $query = "DELETE FROM nota WHERE nota = '".$_POST["nota"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Nota borrada';
 }
}
?>