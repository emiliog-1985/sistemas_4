<?php
$guia = $_POST['guia'];
$target_dir = "../../carga2/subidas/";
$target_file = $target_dir . $guia . ".pdf";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "" . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo '<script type="text/javascript"> alert("el tamaño del archivo es enorme."); window.location.href="../../ajax_soli/index.php"; </script>';
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" ) {
  echo "Lo sentimos, solo los archivos pdf son admitidos.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script type="text/javascript"> alert("Archivo ya existe"); window.location.href="../../ajax_guia/index.php"; </script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo '<script type="text/javascript"> alert("Archivo agregado"); window.location.href="../../ajax_guia/index.php"; </script>';
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>