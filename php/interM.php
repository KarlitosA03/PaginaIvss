<?php
    session_name('for');
    session_start();

    include 'conexion_be.php';

    $num_patronal = $_POST['Num_patronal'];
    $rif = $_POST['rif'];
    // Verificar si el rif ya se encuentra registrado
    $verificar_rif = mysqli_query($conexion,"SELECT * FROM empresas WHERE rif = '$rif'");
    if (mysqli_num_rows($verificar_rif) > 0 ) {
        echo '
            <script>
                alert("el rif ya se encuentra registrado verifique nuevamente");
                window.location.href="../ps.php";
            </script>
        '; 
        exit();
        mysqli_close($conexion);
    }

    // Redirigir a Formulario.php con los valores como parámetros
    $_SESSION['for'] = $rif;
    header("Location: ../Formulario.php?NumeroP=$num_patronal&Rif=$rif");
    exit();
?>