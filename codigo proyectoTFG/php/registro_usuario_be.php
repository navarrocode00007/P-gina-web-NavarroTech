<?php 

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    //encriptamiento contrasena
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
              VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    //verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado, pruebe con otro diferente");
                window.location = "../inicioSesion.php";
            </script>
        ';
        exit();
    }

    //verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya está registrado, pruebe con otro diferente");
                window.location = "../inicioSesion.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../inicioSesion.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Inténtalo de nuevo, usuario almacenado");
                window.location = "../inicioSesion.php";
            </script>
        ';
    }
    mysqli_close($conexion);
?>