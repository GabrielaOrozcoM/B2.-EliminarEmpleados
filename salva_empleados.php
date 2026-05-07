<?php
include "conecta.php";
$nombre = $_POST['nombre'];
$ape = $_POST['ape'];
$correo = $_POST['correo'];
$rol    = $_POST['rol'];
$pasw   = $_POST['pasw'];
$pasw_enc = md5($pasw); 

$sql = "INSERT INTO empleados (name, ape, correo, rol, pasw, status) 
        VALUES ('$nombre', '$ape', '$correo', '$rol', '$pasw_enc', 1)";

if ($conexion->query($sql) === TRUE) {
    echo "ok"; 
    } else {
    echo "Error: " . $conexion->error;
}
$conexion->close();
?>