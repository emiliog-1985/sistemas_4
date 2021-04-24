<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["nme"], $_POST["fsol"], $_POST["nre"], $_POST["nrep"], $_POST["deta"]))
{
 $nme = mysqli_real_escape_string($connect, $_POST["nme"]);
 $fsol = mysqli_real_escape_string($connect, $_POST["fsol"]);
 $nre = mysqli_real_escape_string($connect, $_POST["nre"]);
 $nrep = mysqli_real_escape_string($connect, $_POST["nrep"]);
 $deta = mysqli_real_escape_string($connect, $_POST["deta"]);
 $query = "INSERT INTO soli(nme, fsol, nre, nrep, deta) VALUES('$mne', '$fsol', '$nre', '$nrep', '$deta')";
 if(mysqli_query($connect, $query))
 {
  echo 'Solicitud agregada';
 }
}
?>