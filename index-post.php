<?php
include("conexion.php");
$con = conexion();

$doc = $_POST["doc"];
$nom = $_POST["nom"];
$ape = $_POST["ape"];
$dir = $_POST["dir"];
$cel = $_POST["cel"];

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