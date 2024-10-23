<?php
    session_name('ps');
    session_start();

    include 'conexion_be.php';

    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE ci = '$cedula' 
    and contrasena='$contrasena'");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $cedula;
        header("location: ../ps.php");
        exit();
    }else {
        echo'
            <script>
                alert("Cedula o contraseña incorrecta");
                window.location.href="../index.html";
            </script>
        ';
        exit();
    }
    mysqli_close($conexion);
?>