<?php 
    //session_start();
    include 'conexion_be.php';

    if(isset($_POST['crear'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $rol = $_POST['rol'];
        $correo = $_POST['email'];
        $telefono = $_POST['telefono'];
        $nombre_imagen = $_FILES['foto']['name'];
        $temporal = $_FILES['foto']['tmp_name'];
        $carpeta = 'assets/img';
        $ruta = $carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
     
        if($nombre == "" || $usuario == "" || $rol == "" || $correo == "" || $telefono == ""){
            echo '
                <script>
                    alert("Has dejado un campo sin completar, pruebe otra vez");
                    window.location = "crear_usuario.php";
                </script>
            ';
            exit();
        }

        $user = $_SESSION['usuario'];

        $query = "INSERT INTO usuarios_bd(nombre, usuario, rol, email, telefono, ruta, administrador) 
                VALUES('$nombre', '$usuario', '$rol', '$correo', '$telefono', '$ruta', '$user')";


        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Usuario almacenado exitosamente");
                    window.location = "ver_usuarios.php";
                </script>
            ';
        }
    }
    
    //mysqli_close($conexion);

?>