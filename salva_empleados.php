<?php
include "conecta.php";
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$rol    = $_POST['rol'];
$password   = $_POST['password'];
$pasw_enc = md5($password); 

$sql = "INSERT INTO empleados (name, ape, correo, rol, pasw, status) 
        VALUES ('$nombre', '$apellido', '$correo', '$rol', '$pasw_enc', 1)";

if ($conexion->query($sql) === TRUE) {
    echo "ok"; 
    } else {
    echo "Error: " . $conexion->error;
}
$conexion->close();
?>