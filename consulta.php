<?php
use Dompdf\Dompdf;
session_name('cpago');
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['cpago'])) {
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

$num_patronal = $_GET['num_patronal']; // número patronal que deseas buscar
$query = "SELECT * FROM pagos WHERE num_patronal = '$num_patronal'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    // Crear el contenido HTML para el PDF
    $html = "
    <style>
        table {
            width: 100%;
            border-collapse: collapse; /* Para que los bordes se fusionen */
        }
        th, td {
            border: 1px solid black; /* Bordes de 1px de color negro */
            padding: 8px; /* Espaciado interno */
            text-align: left; /* Alinear texto a la izquierda */
        }
        th {
            background-color: #f2f2f2; /* Color de fondo para los encabezados */
        }
    </style>
    <h1>Pagos registrados para el número patronal $num_patronal</h1>
    <table>
        <tr>
            <th>Período</th>
            <th>Monto</th>
            <th>Referencia</th>
        </tr>";
    
    while($fila = mysqli_fetch_assoc($resultado)) {
        $html .= "<tr>";
        $html .= "<td>" . htmlspecialchars($fila["periodo"]) . "</td>";
        $html .= "<td>" . number_format($fila["monto"], 2) . "</td>";
        $html .= "<td>" . htmlspecialchars($fila["ref"]) . "</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";

    // Incluir DOMPDF
    require_once 'libreria/dompdf/autoload.inc.php';
    
    // Crear una instancia de DOMPDF
    $dompdf = new Dompdf();
    $dompdf->set_paper("A4", "portrait");

    // Cargar el contenido HTML
    $dompdf->load_html($html);

    // Renderizar el PDF
    $dompdf->render();

    // Enviar el PDF al navegador
    $dompdf->stream("pagos_$num_patronal.pdf", array("Attachment" => false));
} else {
    echo "No hay información disponible para el número patronal $num_patronal";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>