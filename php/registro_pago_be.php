<?php
include 'conexion_be.php';

$nroP = $_POST['NumeroP'];
$periodo = $_POST['periodo'];
$monto = $_POST['mon_pago'];
$Ref = $_POST['nro_ref'];
$estatus = $_POST['status'];

// Actualizar el estatus de la empresa
$query_update = "UPDATE empresas SET ESTATUS = '$estatus' WHERE num_patronal = '$nroP'";
$ejecutar_update = mysqli_query($conexion, $query_update);

// Insertar la información en la otra tabla
$query_insert = "INSERT INTO pagos (num_patronal, periodo, monto, ref) VALUES ('$nroP', '$periodo', '$monto', '$Ref')";
$ejecutar_insert = mysqli_query($conexion, $query_insert);

if ($ejecutar_update && $ejecutar_insert) {
    echo '
        <script>
            alert("El pago fue registrado con éxito y el estatus de la empresa fue actualizado");
            window.location.href="../ps.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Intentelo de nuevo, no se pudo actualizar el estatus de la empresa o registrar el pago");
            window.location.href="../ps.php";
        </script>
    ';
}
mysqli_close($conexion);
?>