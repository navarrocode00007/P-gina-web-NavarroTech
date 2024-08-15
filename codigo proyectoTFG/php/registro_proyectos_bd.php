<?php 
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $nombre_imagen = $_FILES['foto']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = 'assets/img';
        $ruta = $carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        if(!isset($_POST['agil']) && !isset($_POST['tradicional'])){
            echo '
                <script>
                    alert("No has seleccionado metodologia, pruebe otra vez");
                    window.location = "crear_proyecto.php";
                </script>
            ';
            exit();
        }
        if($nombre == "" || $descripcion == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "crear_proyecto.php";
                </script>
            ';
            exit();
        }
        if(isset($_POST['agil'])){
            $metodologia = "agil";
        }else{
            if(isset($_POST['tradicional'])){
                $metodologia = "tradicional";
            }
        }

        $user = $_SESSION['usuario'];

        $query = "INSERT INTO proyectos_bd(usuario, nombre, descripcion, metodologia, ruta) 
                VALUES('$user', '$nombre', '$descripcion', '$metodologia', '$ruta')";


        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Proyecto almacenado exitosamente");
                </script>
            ';
        }
    }
    
    //mysqli_close($conexion);

?>