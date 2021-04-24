<?php
$connect = mysqli_connect("localhost", "testing", "sistemas2166", "dro_gestion");
if(isset($_POST["acta"], $_POST["prov"], $_POST["nf"], $_POST["mt"], $_POST["fef"], $_POST["frfm"], $_POST["detar"]))
{
 $acta = mysqli_real_escape_string($connect, $_POST["acta"]);
 $prov = mysqli_real_escape_string($connect, $_POST["prov"]);
 $mt = mysqli_real_escape_string($connect, $_POST["mt"]);
 $fef = mysqli_real_escape_string($connect, $_POST["fef"]);
 $frfm = mysqli_real_escape_string($connect, $_POST["frfm"]);
 $detar = mysqli_real_escape_string($connect, $_POST["detar"]);

 $query = "INSERT INTO recep(acta, prov, nf, mt, fef, frfm, detar) VALUES('$acta', '$prov', '$nf','$mt', '$fef', '$frfm', '$detar')";
 if(mysqli_query($connect, $query))
 {
  echo 'Recepcion agregada';
 }
}
?>