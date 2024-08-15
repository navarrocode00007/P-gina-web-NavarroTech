<?php

    session_start();
    include 'conexion_be.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID del usuario y el proyecto seleccionado
        $proyecto_id = $_POST['id'];
        $proyecto = $_POST['proyecto'];
    
        // Realizar la actualización en la base de datos
        $actualizar = "UPDATE grupos_bd SET proyecto = '$proyecto' WHERE id='$proyecto_id'";
        $resultado = mysqli_query($conexion, $actualizar);
    
        if ($resultado) {
            // Redirigir a la página de usuarios con un mensaje de éxito
            echo '
                <script>
                    alert("proyecto actualizado correctamente");
                    window.location = "../ver_grupos.php";
                    </script>
                ';
            exit();
        } else {
            // Manejar errores si la actualización falla
            $_SESSION['error_message'] = "Error al actualizar el proyecto: " . $conexion->error;
            header("Location: ../ver_grupos.php");
            exit();
        }
    } else {
        // Si el método de solicitud no es POST, redirigir a la página de inicio
        header("Location: inicio.php");
        exit();
    }
?>