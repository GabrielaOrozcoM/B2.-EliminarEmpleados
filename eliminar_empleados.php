<?php
$conexion = new mysqli("localhost", "root", "", "empleados");

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE empleados SET status = 0 WHERE ID = $id";
    
    if($conexion->query($sql)) {
        echo 1;
    } else {
        echo 0;
    }
}
$conexion->close();
?>