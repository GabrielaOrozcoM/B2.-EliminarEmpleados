<?php
include "conecta.php";
$correo = $_POST['correo'];
$sql = "SELECT * FROM empleados WHERE correo = '$correo' AND status = 1";
$res = $conexion->query($sql);

if ($res->num_rows > 0) {
    echo "existe";
} else {
    echo "libre";
}
$conexion->close();
?>