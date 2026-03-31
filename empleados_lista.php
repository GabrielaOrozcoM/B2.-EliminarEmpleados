<?php
$empleados = [
    ['id' => 1, 'nombre' => 'fulano', 'correo' => 'fulano@correo.com', 'rol' => 1],
    ['id' => 2, 'nombre' => 'perengano', 'correo' => 'perengano@correo.com', 'rol' => 2],
    ['id' => 3, 'nombre' => 'carlos', 'correo' => 'carlos@correo.com', 'rol' => 1],
    ['id' => 4, 'nombre' => 'juan', 'correo' => 'ana@correo.com', 'rol' => 2],
    ['id' => 5, 'nombre' => 'luis', 'correo' => 'luis@correo.com', 'rol' => 2]
];
$cantidad = count($empleados);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="app.js"></script>
</head>
<body>
    <div class="Titulo">
        <h1>Listado de Empleados</h1>
        <h3>Total de empleados: <span>(<?php echo $cantidad; ?>)</span></h3>
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
    <div class="tabla">
            <div class="celda">ID</div>
            <div class="celda">Gabriela Sarahi Orozco Madrigal</div>
            <div class="celda">gabriela.orozco9107@alumnos.udg.mx</div>
            <div class="celda">prueba</div>
            <div class="celda">prueba</div>
            <div class="celda">prueba</div>
            <div class="celda">prueba</div>
    </div>
    <!--
    <div>
        
        <div class="encabezado-seccion">
            <h1>Listado de empleados (<?php echo $cantidad; ?>)</h1>
            <a href="empleados_alta.php">Crear nuevo registro</a>
        </div>

        <div class="tabla">
            
            <div class="fila cabecera">
                <div class="celda">ID</div>
                <div class="celda">Nombre completo</div>
                <div class="celda">Correo</div>
                <div class="celda">Rol</div>
                <div class="celda">Ver detalle</div>
                <div class="celda">Editar</div>
                <div class="celda">Eliminar</div>
            </div>

            <?php foreach ($empleados as $emp): ?>
                <div class="fila">
                    <div class="celda"><?php echo $emp['id']; ?></div>
                    <div class="celda"><?php echo htmlspecialchars($emp['nombre']); ?></div>
                    <div class="celda"><?php echo htmlspecialchars($emp['correo']); ?></div>
                    
                    <div class="celda">
                        <?php echo ($emp['rol'] == 1) ? 'Gerente' : 'Ejecutivo'; ?>
                    </div>
                    
                    <div class="celda"></div>
                    <div class="celda"></div>
                    <div class="celda"></div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
            -->

    
</body>
</html>