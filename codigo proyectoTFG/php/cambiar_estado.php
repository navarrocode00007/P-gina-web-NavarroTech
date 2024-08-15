
<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['cambiar'])) {
        // Obtener los datos del formulario
        $estado = $_POST['estado'];
        $requisito_id = $_GET['id']; // ID del proyecto obtenido de la URL

        // Realizar la actualización en la base de datos
        $actualizar = "UPDATE requisitos_bd SET estado='$estado' WHERE id='$requisito_id'";
        // Ejecutar la consulta de actualización
        $resultado=mysqli_query($conexion, $actualizar);

        if ($resultado) {
            // Redirigir a la página de proyectos con un mensaje de éxito
            echo '
                <script>
                    alert("Estado actualizado exitosamente");
                    window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
                </script>
            ';
            exit();
        } else {
            // Manejar errores si la actualización falla
            echo "Error al actualizar el estado: " . $conexion->error;
        }
    }
?>