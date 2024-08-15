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
    
    // Obtener el ID del proyecto de la URL
    $proyecto_id = $_GET['id'];
    $usuarios = "SELECT * FROM proyectos_bd WHERE id='$proyecto_id'";
    $resultado = mysqli_query($conexion, $usuarios);
    $info_proyecto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú lateral responsive</title>

    <link rel="stylesheet" href="assets/css/informacion_proyectos.css">

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
            <a href="informacion_proyecto.php">
                <div class="option" style="padding-left: 30px;">
                <i class="fa-solid fa-eye" title="Extra Link 1"></i>
                    <h4>Proyecto <?php echo $info_proyecto['nombre']; ?></h4>
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

    <main>
        <!-- enlaces arriba -->
        <div class="breadcrumbs">
            <a href="proyectos.php" class="breadcrumb-link">Proyectos</a>
            <span class="breadcrumb-symbol">></span>
            <a href="informacion_proyecto.php?id=<?php echo $info_proyecto['id']; ?>" class="breadcrumb-link">Proyecto <?php echo $info_proyecto['nombre']; ?></a>
        </div>
        <!-- 3 cajas -->
        <div class="container">
            <div class="box">
                <div class="box-header">Épicas / Caracteristicas</div>
                <div class="box-content">
                    Listado de las épicas o características existentes en el proyecto.
                </div>
                <div class="box-footer">
                    <a href="epicas.php?id=<?php echo urlencode($info_proyecto['id']); ?>" class="btn-go">Ir a:</a>
                </div>
            </div>

            <div class="box">
                <div class="box-header">Requisitos</div>
                <div class="box-content">
                    Listado de los requisitos existentes en el proyecto.
                </div>
                <div class="box-footer">
                    <a href="requisitos.php?id=<?php echo urlencode($info_proyecto['id']); ?>" class="btn-go">Ir a:</a>
                </div>
            </div>
        </div>

        <!-- Segunda caja -->
        <?php
            $sql_grupos = "SELECT * FROM grupos_bd WHERE proyecto = '" . $info_proyecto['nombre'] . "'";
            $resultado_grupos = $conexion->query($sql_grupos);
            $grupos = $resultado_grupos->fetch_assoc();
        ?>
        <div class="info-box">
            <div class="info-header">Información del Proyecto</div>
                <div class="info-links">
                    <a href="#" class="info-link">Archivos adjuntos</a>
                    <a href='informacion_grupo.php?id=<?php echo $grupos['id']; ?>' class="info-link">Grupo de trabajo</a>
            </div>
        </div>
        <!-- Contenedor para la descripción -->
        <div class="descripcion-container">
            <!-- Título de la descripción -->
            <h2 class="descripcion-titulo">Descripción del proyecto</h2>
            <!-- Descripción del proyecto -->
            <div class="descripcion">
                <?php echo $info_proyecto['descripcion']; ?>
            </div>
        </div>
    </main>
    <script src="assets/js/proyectos.js"></script>
</body>
</html>