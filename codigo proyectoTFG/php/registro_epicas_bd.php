
<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])) {
        // Obtener los datos del formulario
        $nombre_epica = $_POST['nombre'];
        $descripcion_epica = $_POST['descripcion'];
        $proyecto_id = $_GET['id']; // ID del proyecto obtenido de la URL

        if($nombre_epica == "" || $descripcion_epica == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "epicas.php";
                </script>
            ';
            exit();
        }

        // Preparar la consulta SQL para insertar la nueva épica en la base de datos
        $sql = "INSERT INTO epicas_bd (nombre, descripcion, proyecto_id) VALUES ('$nombre_epica', '$descripcion_epica', '$proyecto_id')";
        
        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            echo '
            <script>
                alert("Épica creada exitosamente");
                window.location = "../epicas.php?id=' . urlencode($proyecto_id) . '";
            </script>
            ';
        } else {
            echo "Error al crear la épica: " . $conexion->error;
        }
    }
?>