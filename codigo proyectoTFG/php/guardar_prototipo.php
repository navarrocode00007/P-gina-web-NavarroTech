<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])) {
        // Obtener los datos del formulario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        //paso 1
        $paso_1 = $_POST['paso_1'];
        $nombre_imagen = $_FILES['foto_paso_1']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = 'assets/img';
        $ruta1 = $carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        //paso 2
        $paso_2 = $_POST['paso_2'];
        $nombre_imagen2 = $_FILES['foto_paso_2']['name'];
        $temporal2 = $_FILES['foto']['tmp_name'];
        $carpeta2 = 'assets/img';
        $ruta2 = $carpeta2.'/'.$nombre_imagen2;
        move_uploaded_file($temporal2,$carpeta2.'/'.$nombre_imagen2);
        //paso 3
        $paso_3 = $_POST['paso_3'];
        $nombre_imagen3 = $_FILES['foto_paso_3']['name'];
        $temporal3 = $_FILES['foto']['tmp_name'];
        $carpeta3 = 'assets/img';
        $ruta3 = $carpeta3.'/'.$nombre_imagen3;
        move_uploaded_file($temporal3,$carpeta3.'/'.$nombre_imagen3);
        //paso 4
        $paso_4 = $_POST['paso_4'];
        $nombre_imagen4 = $_FILES['foto_paso_4']['name'];
        $temporal4 = $_FILES['foto']['tmp_name'];
        $carpeta4 = 'assets/img';
        $ruta4 = $carpeta4.'/'.$nombre_imagen4;
        move_uploaded_file($temporal4,$carpeta4.'/'.$nombre_imagen4);
        //paso 5
        $paso_5 = $_POST['paso_5'];
        $nombre_imagen5 = $_FILES['foto_paso_5']['name'];
        $temporal5 = $_FILES['foto']['tmp_name'];
        $carpeta5 = 'assets/img';
        $ruta5 = $carpeta5.'/'.$nombre_imagen5;
        move_uploaded_file($temporal5,$carpeta5.'/'.$nombre_imagen5);

        $requisito_id = $_GET['id']; // ID del proyecto obtenido de la URL

        if($titulo == "" || $descripcion == "" || $ruta1 == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
                </script>
            ';
            exit();
        }

        // Preparar la consulta SQL para insertar la nueva épica en la base de datos
        $sql = "INSERT INTO prototipo_bd (titulo, descripcion, paso_1, ruta1, paso_2, ruta2, paso_3, ruta3, paso_4, ruta4, paso_5, ruta5, requisito_id) VALUES ('$titulo', '$descripcion', '$paso_1', '$ruta1', '$paso_2', '$ruta2', '$paso_3', '$ruta3', '$paso_4', '$ruta4', '$paso_5', '$ruta5', '$requisito_id')";
        
        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            echo '
            <script>
                alert("Prototipo guardado exitosamente");
                window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
            </script>
            ';
        } else {
            echo "Error al crear el prototipo: " . $conexion->error;
        }
    }
?>