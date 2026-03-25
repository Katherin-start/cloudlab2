<?php
include("conexion.php");
$con = conexion();

$doc = substr($_POST["doc"], 0, 50);
$nom = substr($_POST["nom"], 0, 50);
$ape = substr($_POST["ape"], 0, 50);
$dir = substr($_POST["dir"], 0, 50);
$cel = substr($_POST["cel"], 0, 50);

$sql = "insert into persona values(default,'$doc','$nom','$ape','$dir','$cel')";

if (!$con) {
    die('Error de conexión a la base de datos. Revisa los logs del servidor.');
}

$result = pg_query($con, $sql);
if (!$result) {
    error_log('ERROR pg_query: '.pg_last_error($con));
    die('No se pudo guardar la información.');
}

header("location:index.php");
?>