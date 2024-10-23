<?php
    session_name('rpago');
    session_start();
    $num_patronal = $_POST['num_patronal'];
    
    // Redirigir a Formulario.php con los valores como parámetros
    $_SESSION['rpago'] = $num_patronal;
    header("Location: ../pagos.php?num_patronal=$num_patronal");
    exit();
?>