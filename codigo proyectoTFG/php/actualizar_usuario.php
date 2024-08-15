<?php

    session_start();
    include 'conexion_be.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID del usuario y el grupo seleccionado
        $proyecto_id = $_POST['id'];
        $grupo = $_POST['grupo'];
    
        // Realizar la actualización en la base de datos
        $actualizar = "UPDATE usuarios_bd SET grupo = '$grupo' WHERE id='$proyecto_id'";
        $resultado = mysqli_query($conexion, $actualizar);
    
        if ($resultado) {
            // Redirigir a la página de usuarios con un mensaje de éxito
            echo '
                <script>
                    alert("Grupo actualizado correctamente");
                    window.location = "../ver_usuarios.php";
                    </script>
                ';
            exit();
        } else {
            // Manejar errores si la actualización falla
            $_SESSION['error_message'] = "Error al actualizar el grupo: " . $conexion->error;
            header("Location: ../ver_usuarios.php");
            exit();
        }
    } else {
        // Si el método de solicitud no es POST, redirigir a la página de inicio
        header("Location: inicio.php");
        exit();
    }
?>