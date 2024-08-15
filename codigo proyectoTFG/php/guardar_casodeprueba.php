<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])) {
        // Obtener los datos del formulario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $nombre_imagen = $_FILES['foto_paso_1']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = 'assets/img';
        $ruta = $carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        $paso_paso = $_POST['paso_paso'];
        $requisito_id = $_GET['id']; // ID del proyecto obtenido de la URL

        if($titulo == "" || $descripcion == "" || $paso_paso == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
                </script>
            ';
            exit();
        }

        // Preparar la consulta SQL para insertar la nueva épica en la base de datos
        $sql = "INSERT INTO paso_paso_bd (titulo, descripcion, paso_paso, foto, requisito_id) VALUES ('$titulo', '$descripcion', '$paso_paso', '$ruta', '$requisito_id')";
        
        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            echo '
            <script>
                alert("Caso de prueba guardado exitosamente");
                window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
            </script>
            ';
        } else {
            echo "Error al crear el caso de prueba: " . $conexion->error;
        }
    }
?>