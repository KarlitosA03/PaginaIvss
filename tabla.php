<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <style>
        table, th, td {border:2px solid black;}
    </style>
</head>
<body>
    
</body>
</html>



<?php
session_name('ps');
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Debes iniciar sesión para acceder a esta página");
            window.location.href = "ps.php";
        </script>
    ';
    session_destroy();
    exit();
}

include 'php/conexion_be.php';

$numero_patronal = $_POST['numero_patronal'];
$cedula_identidad = $_POST['cedula_representante'];
$municipio = $_POST['municipio'];

// Verificar si se han enviado los valores desde el formulario
if (isset($_POST['numero_patronal']) || isset($_POST['cedula_representante']) || isset($_POST['municipio'])) {
    // Inicializar la consulta SQL
    $query = "SELECT * FROM empresas";

    // Filtrar por número patronal
    if (isset($_POST['numero_patronal']) && !empty($_POST['numero_patronal'])) {
        $query .= " WHERE num_patronal = '".$_POST['numero_patronal']."'";
    }

    // Filtrar por cédula representante
    if (isset($_POST['cedula_representante']) && !empty($_POST['cedula_representante'])) {
        if (strpos($query, "WHERE") !== false) {
            $query .= " AND ci = '".$_POST['cedula_representante']."'";
        } else {
            $query .= " WHERE ci = '".$_POST['cedula_representante']."'";
        }
    }

    // Filtrar por municipio
    if (isset($_POST['municipio']) && !empty($_POST['municipio'])) {
        if (strpos($query, "WHERE") !== false) {
            $query .= " AND municipio = '".$_POST['municipio']."'";
        } else {
            $query .= " WHERE municipio = '".$_POST['municipio']."'";
        }
    }

    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table>";
        echo "<tr><th>Numero Patronal</th>
        <th>Nombre Empresa</th>
        <th>RIF</th>
        <th>Nombre Patron</th>
        <th>Cedula</th>
        <th>Municipio</th>
        <th>Dirrecion</th>
        <th>Punto Referencia</th>
        <th>Numero Celular</th>
        <th>Correo</th>
        <th>Estatus</th> 
        <th>Registro de pagos</th>
        <th>Consulta de pagos</th></tr>";
        while($fila = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";
            echo "<td>" . $fila["num_patronal"] . "</td>";
            echo "<td>" . $fila["nombre_empre"] . "</td>";
            echo "<td>" . $fila["rif"] . "</td>";
            echo "<td>" . $fila["patrono"] . "</td>";
            echo "<td>" . $fila["ci"] . "</td>";
            echo "<td>" . $fila["municipio"] . "</td>";
            echo "<td>" . $fila["dirrecion"] . "</td>";
            echo "<td>" . $fila["p_ref"] . "</td>";
            echo "<td>" . $fila["num_telf"] . "</td>";
            echo "<td>" . $fila["correo"] . "</td>";
            echo "<td>" . $fila["ESTATUS"] . "</td>";
            echo "<td><form action='php/interM2.php' method='post'><input type='hidden' name='num_patronal' value='" . $fila["num_patronal"] . "'><input type='submit' value='Registrar pago'></form></td>";
            echo "<td><form action='php/interM3.php' method='post'><input type='hidden' name='num_patronal' value='" . $fila["num_patronal"] . "'><input type='submit' value='Consultar pago'></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay información disponible";
    }
} else {
    echo "No se han enviado valores desde el formulario";
}
mysqli_close($conexion);
?>




