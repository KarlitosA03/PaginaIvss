<?php
    include 'conexion_be.php';

    $num_Pa = $_POST['NumeroP'];
    $nombre_empre = $_POST['NombreEmpre'];
    $rif = $_POST['Rif'];
    $nombre = $_POST['NombrePatron'];
    $ci = $_POST['Ci_P'];
    $municipio = $_POST['Municipio'];
    $dirrecion = $_POST['Dirre'];
    $punto_ref = $_POST['Resf_pun'];
    $num_cell = $_POST['Num_cont'];
    $correo = $_POST['correo'];
    $status = $_POST['status'];


    $query = "INSERT  INTO empresas(num_patronal, nombre_empre, rif , patrono , ci , municipio , dirrecion , p_ref  , num_telf , correo, ESTATUS) 
              VALUES('$num_Pa', '$nombre_empre', '$rif', '$nombre', '$ci', '$municipio' , '$dirrecion' , ' $punto_ref' , '$num_cell' , '$correo', '$status')";
              
//verificar que el nombre no se repita en la BD

    $verificar_rif = mysqli_query($conexion,"SELECT * FROM empresas WHERE rif = '$rif'");
 
    if (mysqli_num_rows($verificar_rif) > 0 ) {
        echo '
            <script>
                alert("El rif ya esta registrado, intenta nuevamente");
                window.location.href="../Formulario.php";
            </script>
        '; 
        exit();
        mysqli_close($conexion);
    }


    $ejecutar = mysqli_query($conexion, $query); 

    if ($ejecutar) {
        echo '
            <script>
                alert("la empresa fue registrada con exito");
                window.location.href="../Formulario.php";
            </script>
    
        ';
    }else {
        echo '
        <script>
            alert("Intentelo de nuevo la empresa no pudo ser almacenado");
            window.location.href="../Formulario.php";
        </script>
    ';
    }
    mysqli_close($conexion);
?>