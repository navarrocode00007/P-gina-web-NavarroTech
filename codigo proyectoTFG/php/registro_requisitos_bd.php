
<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])) {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];
        $prioridad = $_POST['prioridad'];
        $complejidad = $_POST['complejidad'];
        $epica = $_POST['epica'];
        $coste = $_POST['coste'];
        $tiempo = $_POST['tiempo'];
        $proyecto_id = $_GET['id']; // ID del proyecto obtenido de la URL

        if($nombre == "" || $descripcion == "" || $coste == "" || $tiempo == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "requisitos.php";
                </script>
            ';
            exit();
        }

        // Preparar la consulta SQL para insertar la nueva épica en la base de datos
        $sql = "INSERT INTO requisitos_bd (nombre, descripcion, proyecto_id, epica, estado, prioridad, complejidad, coste, tiempo) VALUES ('$nombre', '$descripcion', '$proyecto_id', '$epica', '$estado', '$prioridad', '$complejidad', '$coste', '$tiempo')";
        
        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            echo '
            <script>
                alert("Requisito creado exitosamente");
                window.location = "../requisitos.php?id=' . urlencode($proyecto_id) . '";
            </script>
            ';
        } else {
            echo "Error al crear el requisito: " . $conexion->error;
        }
    }
?>