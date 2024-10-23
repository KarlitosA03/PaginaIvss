<?php
    session_name('ps');
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Debes iniciar sesión para acceder a esta página");
                window.location.href = "index.html";
            </script>
        ';
        session_destroy();
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empreza</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <!-- contenedor principal-->
            <div class="caja__trasera">
                <!-- contenedor secundario-->
                <div class="caja__trasera__login">
                    <!-- contenedor secundario/p2-->
                    <h3>Consultar emprezas</h3>
                    <p>Nro Patronal, CI, direccion</p>
                    <button id=btn__iniciar__sesion>Consultar</button>
                </div>
                <div class="caja__trasera__registro">
                    <!-- contenedor secundario/p2-->
                    <h3>Registre emprezas</h3>
                     <!-- -->
                    <p>Requiere informacion minima necesaria</p>
                    <button id=btn__registrarse>Registrar</button>
                </div>
            </div>

            <!-- Formulario de login y registro-->
            <div class="contenedor__login__registro">
                <!-- login-->
                <form action="tabla.php" method="POST" class="formulario__login">
                    <h2>Consultar Empreza</h2>
                    <input type="text" name="numero_patronal" placeholder="Numero patronal">
                    <input type="text" name="cedula_representante" placeholder="Cedula Representante">
                    <select name="municipio" id="municipio">
                        <option value="" selected>Seleccione...</option>
                        <option value="Guaicaipuro">Guaicaipuro</option>
                        <option value="Carrizal">Carrizal</option>
                        <option value="Los_salias">Los salias</option>
                    </select>
                    <button>Consultar</button>
                </form>
                <!--registro-->
                <!--action="php/registro_usuario_be.php" hago referencia para usar ese archivo-->
                <form action="php/interM.php" method="POST" class="formulario__registro">
                    <h2>Registrar Empreza</h2>
                    <input type="text" placeholder="Numero patronal" name="Num_patronal" required>
                    <input type="text" placeholder="RIF" name="rif" required>
                    <button type="submit" value="Enviar">Registrar</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>