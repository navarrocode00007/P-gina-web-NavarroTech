<?php

    session_start();
    include 'php/conexion_be.php';

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Porfavor, debes de iniciar sesión");
                window.location = "inicioSesion.php";
            </script>
        ';
        session_destroy();
        die();
    }

    $user = $_SESSION['usuario'];
    $sql = "SELECT nombre_completo, correo, usuario, contrasena FROM usuarios WHERE correo='$user'";
        $resultado = $conexion->query($sql);

        while($data=$resultado->fetch_assoc()){
            $nombre_completo = $data['nombre_completo'];
            $correo = $data['correo'];
            $usuario = $data['usuario'];
            $contrasena = $data['contrasena'];
        }
    
    /*Obtenemos proyecto a traves de id */

    // Obtener el ID del proyecto de la URL
    $proyecto_id = $_GET['id'];
    $usuarios = "SELECT * FROM proyectos_bd WHERE id='$proyecto_id'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú lateral responsive</title>

    <link rel="stylesheet" href="assets/css/editar_proyecto.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <style>
        /* estilos para el botón de cerrar sesión */
        .close-button {
            background-color: #e74c3c; /* Rojo */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .close-button:hover {
            background-color: #c0392b; /* Rojo más oscuro al pasar el ratón */
        }
    </style>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <div class="user-info" id="user-info">
            <div class="user-data">
                <p><?php echo $nombre_completo; ?></p>
                <p><?php echo $usuario; ?></p> 
            </div>
        </div>

    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <img src="assets/img/logoo.jpg" alt="Tu Logo" class="logo">
            <h4>Navarro Tech</h4>
        </div>

        <div class="options__menu">	

            <a href="bienvenida.php">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="proyectos.php">
                <div class="option">
                    <i class="far fa-file" title="Portafolio"></i>
                    <h4>Proyectos</h4>
                </div>
            </a>
            
            <a href="#" id="blog_link">
                <div class="option">
                    <i class="far fa-sticky-note" title="Blog"></i>
                    <h4>Administración</h4>
                </div>
            </a>
            
            <div id="extra_links" style="display: none;">
                <a href="crear_proyecto.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-plus" title="Extra Link 1"></i>
                        <h4>Crear proyecto</h4>
                    </div>
                </a>
                <a href="proyectos_MOD.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-pen-to-square" title="Extra Link 2"></i>
                        <h4>Modificar proyecto</h4>
                    </div>
                </a>
                <a href="proyectos_ELI.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-trash" title="Extra Link 3"></i>
                        <h4>Eliminar proyecto</h4>
                    </div>
                </a>
            </div>
            
            <a href="#" id="blog_link2">
                <div class="option">
                    <i class="fa-solid fa-user" title="Blog"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>
            
            <div id="extra_links2" style="display: none;">
                <a href="crear_usuario.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-plus" title="Extra Link 1"></i>
                        <h4>Crear usuario</h4>
                    </div>
                </a>
                <a href="ver_usuarios.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-eye" title="Extra Link 2"></i>
                        <h4>Ver usuarios</h4>
                    </div>
                </a>
            </div>

            <a href="#" id="blog_link3">
                <div class="option">
                    <i class="fa-solid fa-people-group" title="Blog"></i>
                    <h4>Grupos</h4>
                </div>
            </a>
            
            <div id="extra_links3" style="display: none;">
                <a href="crear_grupo.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-plus" title="Extra Link 3"></i>
                        <h4>Crear grupo</h4>
                    </div>
                </a>
                <a href="ver_grupos.php">
                    <div class="option" style="padding-left: 30px;">
                        <i class="fa-solid fa-eye" title="Extra Link 3"></i>
                        <h4>Ver grupos</h4>
                    </div>
                </a>
            </div>

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>Contacto</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

        </div>

    </div>

    <main style="position: relative;">
        <form class="container" action="php/actualizar_proyecto.php" method="POST">
                <h2>Proyecto a modificar</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Usuario</th>
                                <th>Descripción</th>
                                <th>Metodología</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = mysqli_query($conexion, $usuarios);
                                while ($proyecto = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$proyecto['id']} <input type='hidden' name='id' value='{$proyecto['id']}'></td>";
                                    echo "<td><input type='text' value='{$proyecto['nombre']}' name='nombre'></td>";
                                    echo "<td><img src='{$proyecto['ruta']}' alt='Foto del proyecto' style='max-width: 100px; max-height: 100px;'><input type='hidden' name='ruta' value='{$proyecto['ruta']}'></td>";
                                    echo "<td>{$proyecto['usuario']} <input type='hidden' name='usuario' value='{$proyecto['usuario']}'></td>";
                                    echo "<td><textarea style='width: 300px; height: 100px;' name='descripcion'>{$proyecto['descripcion']}</textarea></td>";
                                    echo "<td> 
                                            <input type='radio' id='agil_checkbox' name='metodologia' value='agil'>
                                            <label for='agil_checkbox'>Ágil</label>
                                            <br>
                                            <input type='radio' id='tradicional_checkbox' name='metodologia' value='tradicional'>
                                            <label for='agil_checkbox'>Tradicional</label>
                                        </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- BOTON CREAR -->
                <input type="submit" value="Actualizar" class="create-button">
        </form>
    </main>

    <script src="assets/js/crear_proyecto.js"></script>
</body>
</html>

