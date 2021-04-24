<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["rut"], $_POST["ndp"], $_POST["ndc"], $_POST["email"], $_POST["nt"]))
{
 $rut = mysqli_real_escape_string($connect, $_POST["rut"]);
 $ndp = mysqli_real_escape_string($connect, $_POST["ndp"]);
 $ndc = mysqli_real_escape_string($connect, $_POST["ndc"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $nt = mysqli_real_escape_string($connect, $_POST["nt"]);
 $query = "INSERT INTO prov(rut, ndp, ndc, email, nt) VALUES('$rut', '$ndp', '$ndc', '$email', '$nt')";
 if(mysqli_query($connect, $query))
 {
  echo 'Proveedor agregado';
 }
}
?>