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

    <link rel="stylesheet" href="assets/css/epicas.css">

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
            <a href="informacion_proyecto.php?id=<?php echo $proyecto_id; ?>">
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
            <span class="breadcrumb-symbol">></span>
            <a class="breadcrumb-link">Épicas</a>
        </div>

        <div class="centered-content">
            <a href="#" class="add-epic-button" id="add_epic_button">
                <div class="aniade">
                    <i class="fa-solid fa-plus" title="Extra Link 1"></i>
                    <h4>Añadir Épica</h4>
                </div>
            </a>
            
            <!-- Formulario para añadir épica, inicialmente oculto -->
            <form action="php/registro_epicas_bd.php?id=<?php echo $proyecto_id; ?>" id="add_epic_form" style="display: none; margin-top: 20px;" method="POST">
                <div class="form-group">
                    <label for="nombre" class="form-label"><strong>Título de la épica:</strong></label>
                    <input type="text" id="nombre" name="nombre" required class="form-input-sm">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label"><strong>Descripción:</strong></label>
                    <textarea id="descripcion" name="descripcion" class="form-textarea-sm" placeholder="Escribe aquí" required></textarea>
                </div>

                <div class="form-group centered">
                    <input type="submit" name="crear" value="Crear" class="submit-button">
                </div>
            </form>
        </div>

        <div class="container_epicas">
            <div id="epicas-list">
                <div style="text-align: center;">
                    <h3>Listado de Épicas</h3>
                </div>
                <ol id="epicas-ol">
                    <?php
                    // Consulta SQL para obtener todas las épicas asociadas al proyecto
                    $sql_epicas = "SELECT * FROM epicas_bd WHERE proyecto_id = '$proyecto_id'";
                    $resultado_epicas = $conexion->query($sql_epicas);

                    // Contador para numerar las épicas
                    $contador = 1;

                    // Mostrar las épicas en la lista
                    while ($epica = $resultado_epicas->fetch_assoc()) {
                        echo "<li><span class='contador'>" . $contador . ".</span> <span class='epica'>" . strtoupper($epica['nombre']) . ":</span> <span class='descripcion'>" . $epica['descripcion'] . "</span> <button class='expandir-btn'>Ver descripcion completa</button></li>";
                        $contador++; // Incrementar contador después de imprimir cada elemento
                    }
                    ?>
                </ol>
            </div>
        </div>
    </main>
    <script src="assets/js/proyectos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtener referencias al botón y al formulario
            var addButton = document.getElementById('add_epic_button');
            var addForm = document.getElementById('add_epic_form');

            // Manejar el clic en el botón
            addButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

                // Cambiar la visibilidad del formulario
                if (addForm.style.display === 'none') {
                    addForm.style.display = 'block';
                } else {
                    addForm.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.expandir-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const descripcion = this.previousElementSibling;
                    descripcion.classList.toggle('expandir');
                    if (descripcion.classList.contains('expandir')) {
                        this.textContent = 'Cerrar';
                    } else {
                        this.textContent = 'Ver descripcion completa';
                    }
                });
            });
        });
    </script>
</body>
</html>