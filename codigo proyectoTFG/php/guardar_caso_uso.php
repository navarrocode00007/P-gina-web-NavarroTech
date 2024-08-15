<?php
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])) {
        // Obtener los datos del formulario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $actores = $_POST['actores'];
        $flujo_basico = $_POST['flujo_basico'];
        $requisito_id = $_GET['id']; // ID del proyecto obtenido de la URL

        if($titulo == "" || $descripcion == "" || $actores == "" || $flujo_basico == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
                </script>
            ';
            exit();
        }

        // Preparar la consulta SQL para insertar la nueva épica en la base de datos
        $sql = "INSERT INTO casodeuso_bd (titulo, descripcion, actores, flujo_basico, requisito_id) VALUES ('$titulo', '$descripcion', '$actores', '$flujo_basico', '$requisito_id')";
        
        // Ejecutar la consulta
        if($conexion->query($sql) === TRUE) {
            echo '
            <script>
                alert("Caso de uso guardado exitosamente");
                window.location = "../ver_requisito.php?id=' . urlencode($requisito_id) . '";
            </script>
            ';
        } else {
            echo "Error al crear el caso de uso: " . $conexion->error;
        }
    }
?>