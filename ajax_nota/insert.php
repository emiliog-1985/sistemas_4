<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nota"], $_POST["prov"], $_POST["ord"], $_POST["det"]))
{
 $nota = mysqli_real_escape_string($connect, $_POST["nota"]);
 $prov = mysqli_real_escape_string($connect, $_POST["prov"]);
 $ord = mysqli_real_escape_string($connect, $_POST["ord"]);
 $det = mysqli_real_escape_string($connect, $_POST["det"]);
 $query = "INSERT INTO nota(nota, prov, ord, det) VALUES('$nota', '$prov', '$ord', '$det')";
 if(mysqli_query($connect, $query))
 {
  echo 'Nota credito agregada';
 }
}
?>