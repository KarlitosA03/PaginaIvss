<?php 

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasena'];
    $clave = $_POST['clave'];
    /*$contrasena = hash('sha512',$contrasena);*/
    $contraclave = 9122003;


    if ($clave != $contraclave  ) {
        echo '
            <script>
                alert("CLave de acseso errada intentelo nuevamente");
                window.location.href="../index.html";
            </script>
        '; 
        exit();
        mysqli_close($conexion);
    }

    $query = "INSERT  INTO usuarios(nombre_completo, ci, contrasena) 
              VALUES('$nombre_completo', '$cedula', '$contrasena')"; 


    //verificar que la cedula no se repita en la BD
    $verificar_ci = mysqli_query($conexion,"SELECT * FROM usuarios WHERE ci = '$cedula'");

    if (mysqli_num_rows($verificar_ci) > 0 ) {
        echo '
            <script>
                alert("la cedula ya esta registrado, intenta con otra diferente");
                window.location.href="../index.html";
            </script>
        '; 
        exit();
        mysqli_close($conexion);
    }
    //verificar que el nombre no se repita en la BD
    
    $verificar_nombre = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre_completo = '$nombre_completo'");
     
    if (mysqli_num_rows($verificar_nombre) > 0 ) {
        echo '
            <script>
                alert("El nombre ya esta registrado, intenta nuevamente");
                window.location.href="../index.html";
            </script>
        '; 
        exit();
        mysqli_close($conexion);
    }
    

    $ejecutar = mysqli_query($conexion, $query); 

    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario creado con exito");
                window.location.href="../index.html";
            </script>
        
        ';
    }else {
        echo '
        <script>
            alert("Intentelo de nuevo usuario no almacenado");
            window.location.href="../index.html";
        </script>
    ';
    }
    mysqli_close($conexion);
?>