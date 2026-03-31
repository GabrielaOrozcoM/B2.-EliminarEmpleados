<?php
$servidor = "localhost";
$usuario = "root";
$password = "";          
$base_datos = "empleados";  
$sql = "SELECT * FROM `empleados` WHERE status = 1;";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query($sql);
$cantidad = $resultado->num_rows;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div id="mensaje" style="text-align:center; color: white; background: red;"></div>

    <div class="Titulo">
        <h1>Listado de Empleados</h1>
        <h3>Total de empleados: <span>(<?php echo $cantidad; ?>)</span></h3><a href="empleados_alta.php">Crear Nuevo Registro</a>
    </div>
    
    <div class="Cabecera">
        <div class="celdaInicial">ID</div>
        <div class="celdaInicial">Nombre Completo</div>
        <div class="celdaInicial">Correo</div>
        <div class="celdaInicial">Rol</div>
        <div class="celdaInicial">Ver Detalle</div>
        <div class="celdaInicial">Editar</div>
        <div class="celdaInicial">Eliminar</div>
    </div>

    <?php
    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            $id = $fila['ID'];
            ?>
            <div class="fila" id="fila-<?php echo $id; ?>">
                <div class="celda"><?php echo $id; ?></div>
                <div class="celda"><?php echo $fila['name']; ?></div>
                <div class="celda"><?php echo $fila['correo']; ?></div>
                <div class="celda"><?php echo $fila['rol']; ?></div>
                
                <div class="celda"><button>Ver</button></div>
                <div class="celda"><button>Editar</button></div>
                <div class="celda"><button onclick="elimina(<?php echo $id; ?>);">Eliminar</button></div>
            </div>
            <?php
        }
    } else {
        echo "<div class='fila'><div class='celda'>No hay empleados registrados</div></div>";
    }
    $conexion->close();
    ?>

    <script>
    function elimina(id_empleado) { 
        if(id_empleado => 0) {
            if(confirm('¿Realmente deseas eliminar al empleado ' + id_empleado + '?')) {
                $.ajax({
                    url      : 'eliminar_empleados.php', 
                    type     : 'post',
                    dataType : 'text',
                    data     : { id: id_empleado },
                    success  : function(res) {
                        if (res == 1) { 
                            $('#fila-' + id_empleado).remove();
                            $('#mensaje').html('EMPLEADO ELIMINADO');
                            setTimeout(function(){ $('#mensaje').html(''); }, 3000);
                        } else {
                            $('#mensaje').html('ERROR AL ELIMINAR EN BD');
                        }
                    }, 
                    error: function() {
                        alert('Error: No se pudo conectar con el servidor');
                    }
                });
            }
        } else {
            alert('ID no válido');
        }
    }
    </script>
</body>
</html>