<?php 
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $jefe = $_POST['jefe'];
        $nombre_imagen = $_FILES['foto']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = 'assets/img';
        $ruta = $carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
     
        if($nombre == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "crear_grupo.php";
                </script>
            ';
            exit();
        }

        $validar_login = mysqli_query($conexion, "SELECT * FROM grupos_bd WHERE nombre='$nombre'");

        if(mysqli_num_rows($validar_login) > 0){
            echo '
                <script>
                    alert("El nombre del grupo ya existe, por favor vuelve a intentarlo con otro nombre.");
                    window.location = "crear_grupo.php";
                </script>
            ';
            exit();
        }
        $user = $_SESSION['usuario'];

        $query = "INSERT INTO grupos_bd(nombre, jefe, ruta) 
                VALUES('$nombre', '$jefe', '$ruta')";


        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Usuario almacenado exitosamente");
                    window.location = "crear_grupo.php";
                </script>
            ';
        }
    }
    
    //mysqli_close($conexion);

?>