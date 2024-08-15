<?php
    // Conexión a la base de datos y otras configuraciones
    include 'conexion_be.php';

    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    if(!isset($_POST['metodologia'])){
        echo '
            <script>
                alert("No has seleccionado metodologia, pruebe otra vez");
                window.location = "../proyectos_MOD.php";
            </script>
        ';
        exit();
    }
    $metodologia = $_POST['metodologia'];
    $ruta = $_POST['ruta'];
    
    // Realizar la actualización en la base de datos
    $actualizar = "UPDATE proyectos_bd SET usuario='$usuario', nombre='$nombre', descripcion='$descripcion', metodologia='$metodologia', ruta='$ruta' WHERE id='$id'";
    // Ejecutar la consulta de actualización
    $resultado=mysqli_query($conexion, $actualizar);

    if ($resultado) {
        // Redirigir a la página de proyectos con un mensaje de éxito
        echo '
            <script>
                alert("Proyecto actualizado exitosamente");
                window.location = "../proyectos.php";
            </script>
        ';
        exit();
    } else {
        // Manejar errores si la actualización falla
        echo "Error al actualizar el proyecto: " . $conexion->error;
    }
    
?>