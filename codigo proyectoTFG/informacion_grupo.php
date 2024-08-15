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
    $usuarios = "SELECT * FROM grupos_bd WHERE id='$proyecto_id'";
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

    <link rel="stylesheet" href="assets/css/informacion_grupos.css">

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

    <main>
        <!-- enlaces arriba -->
        <div class="breadcrumbs">
            <a href="ver_grupos.php" class="breadcrumb-link">Grupos</a>
            <span class="breadcrumb-symbol">></span>
            <a href="informacion_grupo.php?id=<?php echo $info_proyecto['id']; ?>" class="breadcrumb-link">Grupo: <?php echo $info_proyecto['nombre']; ?></a>
            <span class="breadcrumb-symbol">></span>
        </div>
        
        <!-- Título del grupo -->
         <h1 class="grupo-title">Nombre grupo: <?php echo $info_proyecto['nombre']; ?></h1>

        <!-- jefe del grupo -->
        <h1 class="jefe-grupo-title">Jefe del proyecto: <span class="jefe-name"><?php echo $info_proyecto['jefe']; ?></span></h1>
   
        <!-- Contenedor de Analistas -->
        <div class="container">
            <div class="analistas">
                <h3>Analistas</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='analista' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Contenedor de Programadores -->
            <div class="programadores">
                <h3>Programadores</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='programador' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor de Diseñadores -->
        <div class="container">
            <div class="analistas">
                <h3>Diseñadores</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='diseñador' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Contenedor de Testers -->
            <div class="programadores">
                <h3>Testers</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='tester' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor de Analistas -->
        <div class="container">
            <div class="analistas">
                <h3>Aseguradores de calidad</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='asegurador de calidad' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Contenedor de Programadores -->
            <div class="programadores">
                <h3>Documentadores</h3>
                <div class="table-container">
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Grupo de trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta SQL para obtener los usuarios
                                    $user = $_SESSION['usuario'];
                                    $sql_proyectos = "SELECT * FROM usuarios_bd WHERE rol='documentador' and grupo='{$info_proyecto['nombre']}'";
                                    $resultado_proyectos = $conexion->query($sql_proyectos);

                                    while($proyecto = $resultado_proyectos->fetch_assoc()) {
                                        echo "<td>" . $proyecto['nombre'] . "</td>";
                                        echo "<td>" . $proyecto['rol'] . "</td>";
                                        echo "<td>" . $proyecto['email'] . "</td>";  
                                        echo "<td>" . $proyecto['grupo'] . "</td>";                                       
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/proyectos.js"></script>
</body>
</html>