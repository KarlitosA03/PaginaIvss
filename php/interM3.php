<?php
    session_name('cpago');
    session_start();
    $num_patronal = $_POST['num_patronal'];
    
    // Redirigir a Formulario.php con los valores como parámetros
    $_SESSION['cpago'] = $num_patronal;
    header("Location: ../consulta.php?num_patronal=$num_patronal");
    exit();
?>