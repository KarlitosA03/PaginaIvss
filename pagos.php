<?php
    session_name('rpago');
    session_start();
    if (!isset($_SESSION['rpago'])) {
        echo '
            <script>
                alert("Debes iniciar sesión para acceder a esta página");
                window.location.href = "ps.php";
            </script>
        ';
        session_destroy();
        exit();
    }
    $num_patronal = $_GET['num_patronal'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de pagos</title>
    <style>
        table, th, td {border:2px solid black;}
    </style>
</head>
<body>
    <form action="php/registro_pago_be.php" method="post">
        <table>
            <tbody>
                <tr>
                    <th><label for="nro_patronal">Numero Patronal</label></th>
                    <th><input type="text" name="NumeroP" value=<?php echo $num_patronal ?> readonly></th>
                </tr>
                <tr>
                    <th><label for="periodo">Periodo del pago</label></th>
                    <th><input type="date" id="periodo" name="periodo" required></th>
                </tr>
                <tr>
                    <th><label for="monto">Monto del pago</label></th>
                    <th><input type="number" id="mon_pago" name="mon_pago"step="0.01" required></th>
                </tr>
                <tr>
                    <th><label for="nro_ref">Nuemero de referencia</label></th>
                    <th><input type="number" id="nro_ref" name="nro_ref" required></th>
                </tr>
                <tr>
                    <th><label for="estatus">Estatus de la empresa</label></th>
                    <th>
                        <!-- tengo que verificar el value opcion , para que sirve (usuario / admin)-->
                        <select name="status" id="status" required>
                            <option value="" selected>Seleccione...</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="enviar informacion">
    </form>
</body>
</html>