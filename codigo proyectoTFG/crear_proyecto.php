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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú lateral responsive</title>

    <link rel="stylesheet" href="assets/css/crear_proyecto.css">

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
        </div>
    </div>

    <main style="position: relative;">
        <h1 class="titulo">Crear Proyecto</h1><br>

        <form method="POST" enctype="multipart/form-data">        
            <!-- NOMBRE -->
            <label for="project_name" class="label-project-name">Nombre del proyecto:</label>
            <input type="text" placeholder="Escribe aquí" name="nombre" id="project_name" class="input-project-name">

            <!-- DESCRIPCION -->
            <label for="descripcion" class="label-descripcion">Descripción:</label>
            <input type="text" placeholder="Escribe aquí" name="descripcion" id="descripcion" class="input-descripcion">

            <!-- METODOLOGIA -->
            <label for="metodologia" class="label-metodologia">Metodologia:</label>

            <input type="radio" id="agil_checkbox" name="agil" class="person-checkbox">
            <label for="agil_checkbox" class="person-label">Ágil</label>
            <br>
            <input type="radio" id="tradicional_checkbox" name="tradicional" class="person-checkbox2">
            <label for="tradicional_checkbox" class="person-label2">Tradicional</label> 

            <!-- tipo de requisito -->
            <h2 class="tipo_requisito">Tipos de requisitos disponibles:</h2>
            <input type="checkbox" id="option1_checkbox" name="option1" class="option-checkbox">
            <label for="option1_checkbox" class="option-label3" >Funcionales</label>
            <br>
            <input type="checkbox" id="option2_checkbox" name="option2" class="option-checkbox2">
            <label for="option2_checkbox" class="option-label4" >No Funcionales</label>
            <br>
            <input type="checkbox" id="option3_checkbox" name="option3" class="option-checkbox3">
            <label for="option3_checkbox" class="option-label5" >De Interfaz</label>
            <br>
            <input type="checkbox" id="option4_checkbox" name="option4" class="option-checkbox4" >
            <label for="option4_checkbox" class="option-label6" >De Datos</label>
            <br>
            <input type="checkbox" id="option5_checkbox" name="option5" class="option-checkbox5">
            <label for="option5_checkbox" class="option-label7" >De Mantenimiento</label>

            <!-- ADJUNTAR FOTO DEL PROYECTO -->
            <h2 class="foto_portada">Adjuntar foto portada:</h2>
            <input type="file" id="foto" name="foto" class="photo-input">

            <!-- BOTON CREAR -->
            <input type="submit" name="crear" id="create_button" class="create-button">
        </form>
            <?php 
            include("php/registro_proyectos_bd.php");
            ?>
    </main>

    <script src="assets/js/crear_proyecto.js"></script>
</body>
</html>

