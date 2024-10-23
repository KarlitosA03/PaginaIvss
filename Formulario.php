<?php
    session_name('for');
    session_start();

    if (!isset($_SESSION['for'])) {
        echo '
            <script>
                alert("Debes iniciar sesión para acceder a esta página");
                window.location.href = "ps.php";
            </script>
        ';
        session_destroy();
        exit();
    }
    $num_patronal = $_GET['NumeroP'];
    $rif = $_GET['Rif'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario</title>
    <style>
        table, th, td {border:2px solid black;}
    </style>
</head>
<body> 
    <form action="php/ingreso.php" method="post">
        <table style="width: 500px;">
            <tbody>
                <tr>
                    <th><label for="NumeroP">Numero Patronal</label></th> 
                    <th><input type="text" name="NumeroP" value=<?php echo $num_patronal ?> readonly></th>
                </tr>
                <tr>
                    <th><label for="NombreEmpre">Nombre de la razon social</label></th> 
                    <th><input type="text" name="NombreEmpre" placeholder="Introduce el nombre de la razon social" required></th>
                </tr>
                <tr>
                    <th><label for="RIF">Rif</label></th>
                    <th><input type="text" name="Rif" value=<?php echo $rif ?> readonly></th>
                </tr>
                <tr>
                    <th><label for="NombrePatron">Nombre del Patrono</label></th>
                    <th><input type="text" name="NombrePatron" placeholder="Introduce el nombre del patron" required></th>
                </tr>
                <tr>
                    <th><label for="Ci_P">Cedula del patron</label></th>
                    <th><input type="text" name="Ci_P" placeholder="Introduce el numero de Ci" required ></th>
                </tr>
                <tr>
                    <th><label for="Municipio">Municipio</label></th>
                    <th>
                        <select name="Municipio" required>
                            <option value="" selected>Seleccione...</option>
                            <option value="Guaicaipuro">Guaicaipuro</option>
                            <option value="Carrizal">Carrizal</option>
                            <option value="Los_salias">Los salias</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th><label for="Dirre">Dirrecion completa</label></th>
                    <th><input type="text" name="Dirre" placeholder="Introduce la Dirrecion completa" required></th>
                </tr>
                <tr>
                    <th><label for="Resf_pun">Punto de referencia</label></th>
                    <th><input type="text" name="Resf_pun" placeholder="Introduce el Punto de referencia" required></th>
                </tr>
                <tr>
                    <th><label for="Num_cont">Numero de telefono</label></th>
                    <th><input type="text" name="Num_cont" placeholder="Introduce el Numero del empleador" required></th>
                </tr>
                <tr>
                    <th><label for="correo">Correo electronico</label></th>
                    <th><input type="text" name="correo" placeholder="Introduce el Correo electronico" required></th>
                </tr>
                <tr>
                    <th><label for="status">Estatus de la empresa</label></th>
                    <th>
                        <select name="status" required>
                            <option value="" selected>Seleccione...</option>
                            <option value="Activo">Activo</option>
                            <option value="inactivo">inactivo</option>
                        </select>
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>