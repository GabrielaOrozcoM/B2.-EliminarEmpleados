<html>
 <head>
  <title>Formulario request</title>
  <link rel="stylesheet" href="estilos.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 </head>

 <body>
    <div class="titulo">
        <h1>FORMULARIO</h1>
        <a href="empleados_lista.php">Regresar al listado</a>
    </div>
    <form name="Alta_de_empleados" action="empleados_lista.php" method="POST">
    <div class="baseform">   
    <div class="form">
                <label>Nombre(s):<input id="name" type="text" name="name" placeholder="Nombre del Empleado" required></label><br>
                <label>apellidollidos:<input id="apellido" type="text" name="apellido" placeholder="apellidollidos del Empleado" required></label><br>
                <label>Correo:<input id="correo" type="email" name="correo" placeholder="Correo del Empleado" onBlur="validarCorreo();"><br>
                <div id="msgCorreo" style="color:red; font-size:medium; display:none"></div></label>
                <label for="rol">Rol del Empleado:
                    <select name="rol">
                        <option value="0" selected>Selecciona</option>
                        <option value="1">Gerente</option>
                        <option value="2">Ejecutivo</option>			
                    </select>
                </label>
                <label for="password">Contraseña:<input type="password" name="password"></label><br>
        </div>
        <div class="formbutton">
            <button onClick="recibe(); return false;" type="submit">Registrar</button>
        </div>
    </div> 
    </form>
    <div id="contenedor" style="text-align: center; font-size: larger; background-color:rgba(93, 63, 22, 0.524);"></div>
	<div id="contenedordeInfo" style="text-align:left; font-size:medium; background-color:rgba(3, 136, 148, 0.524);"></div>
 </body>
</html>

<script>
	function validarCorreo() {
    let correo = $("#correo").val();
    if (correo != "") {
        $.ajax({
            url: 'verificar_correo.php',
            type: 'POST',
            data: { correo: correo },
            success: function(res) {
                if (res.trim() == "existe") {
                    $("#msgCorreo")
                        .text("El correo " + correo + " ya existe.")
                        .show()
                        .delay(5000)
                        .fadeOut();
                    $("#correo").val("");
                }
            }
        });
    }
}
    function recibe(){      
        let nombre = $("input[name='name']").val();
        let apellido = $("input[name='apellido']").val();
        let correo = $("#correo").val();
		let rol = $("select[name='rol']").val();
		let password = $("input[name='password']").val();
        if (apellido === "" || nombre === ""||correo === "" || rol === "0" || password === "") {
            $("#contenedor").show();    
            $("#contenedor").text("Faltan campos por llenar").delay(5000).fadeOut();
		} else {
            $.ajax({
                url: 'salva_empleados.php',
                type: 'POST',
                dataType: 'text',
                data: {
                    nombre: nombre,
                    apellido: apellido,
                    correo: correo,
                    rol: rol,
                    password: password
                },
            success: function(res) {
                if (res.trim() == "ok") {
                    $("#contenedordeInfo").show();
                    $("#contenedordeInfo").html("<b>Datos Guardados</b>").delay(3000).fadeOut();
                    document.Alta_de_empleados.reset();
                } else {
                    alert("Error real del servidor: " + res);
                }
            }
        });
    }
}
    
</script>