<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nfac"], $_POST["prov"], $_POST["ord"], $_POST["det"]))
{
 $nfac = mysqli_real_escape_string($connect, $_POST["nfac"]);
 $prov = mysqli_real_escape_string($connect, $_POST["prov"]);
 $ord = mysqli_real_escape_string($connect, $_POST["ord"]);
 $det = mysqli_real_escape_string($connect, $_POST["det"]);
 $query = "INSERT INTO guia(nfac, prov, ord, det) VALUES('$nfac', '$prov', '$ord', '$det')";
 if(mysqli_query($connect, $query))
 {
  echo 'Guia agregada';
 }
}
?>