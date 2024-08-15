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

    <link rel="stylesheet" href="assets/css/requisitos.css">

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
            <a class="breadcrumb-link">Requisitos</a>
        </div>

        <div class="centered-content">
            <a href="#" class="add-epic-button" id="add_epic_button">
                <div class="aniade">
                    <i class="fa-solid fa-plus" title="Extra Link 1"></i>
                    <h4>Añadir Requisito</h4>
                </div>
            </a>
            
            <!-- Formulario para añadir épica, inicialmente oculto -->
            <form action="php/registro_requisitos_bd.php?id=<?php echo $proyecto_id; ?>" id="add_epic_form" style="display: none; margin-top: 20px;" method="POST">
                <div class="form-group">
                    <label for="nombre" class="form-label"><strong>Título del requisito:</strong></label>
                    <input type="text" id="nombre" name="nombre" required class="form-input-sm">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label"><strong>Descripción:</strong></label>
                    <textarea id="descripcion" name="descripcion" class="form-textarea-sm" placeholder="Escribe aquí" required></textarea>
                </div>

                <div class="form-group-cajas-container">
                    <div class="form-group-cajas">
                        <label for="estado"><strong>Estado:</strong></label>
                        <div class="select-container">
                            <select id="estado" name="estado">
                                <option value="propuesto">Propuesto</option>
                                <option value="en_revision">En revisión</option>
                                <option value="en_desarrollo">En desarrollo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-cajas">
                        <label for="prioridad"><strong>Prioridad:</strong></label>
                        <div class="select-container">
                            <select id="prioridad" name="prioridad">
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-cajas">
                        <label for="complejidad"><strong>Complejidad:</strong></label>
                        <div class="select-container">
                            <select id="complejidad" name="complejidad">
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                    </div>

                    <?php
                        $sql_epicas = "SELECT * FROM epicas_bd WHERE proyecto_id = '$proyecto_id'";
                        $resultado_epicas = $conexion->query($sql_epicas);

                        // Almacenar los resultados de $resultado_grupos en un array
                        $epicas_array = array();
                        while($epicas = $resultado_epicas->fetch_assoc()) {
                            $epicas_array[] = $epicas;
                        }
                    ?>

                    <div class="form-group-cajas">
                        <label for="epica"><strong>Selecciona Epica:</strong></label>
                        <div class="select-container">
                            <select id="epica" name="epica">
                                <?php foreach($epicas_array as $epicas) {
                                    $selected = ""; // Define la variable $selected
                                    echo "<option value='" . $epicas['id'] . "' $selected>" . $epicas['nombre'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-cajas">
                        <label for="coste"><strong>Coste:</strong></label>
                        <div class="input-container">
                            <input type="number" id="coste" name="coste" step="0.01" pattern="^\d+(\.\d{1,2})?$" placeholder="€">
                        </div>
                    </div>

                    <div class="form-group-cajas">
                        <label for="tiempo"><strong>Tiempo:</strong></label>
                        <div class="input-container">
                            <input type="number" id="tiempo" name="tiempo" step="1" pattern="^\d+(\.\d{1,2})?$" placeholder="hrs">
                        </div>
                    </div>

                </div>
                
                <div class="form-group centered" style="margin-top: 20px;">
                    <input type="submit" name="crear" value="Crear" class="submit-button">
                </div>
            </form>
        </div>
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>ÉPICA</th>
                        <th>REQUISITOS ASOCIADOS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Recorrer las epicas y mostrar los requisitos asociados
                        foreach($epicas_array as $epica) {
                            echo "<tr>";
                            echo "<td>" . $epica['nombre'] . "</td>";
                            echo "<td>";
                            
                            // Consultar requisitos asociados a esta epica
                            $epica_id = $epica['id'];
                            //Propuestos
                            $sql_requisitos1 = "SELECT * FROM requisitos_bd WHERE epica = '$epica_id' AND estado='propuesto'";
                            $resultado_requisitos1 = $conexion->query($sql_requisitos1);

                            if ($resultado_requisitos1->num_rows > 0) {
                                echo "<h5>PROPUESTOS</h5>";

                                while($requisito = $resultado_requisitos1->fetch_assoc()) {
                                    echo "<a href='ver_requisito.php?id=" . $requisito['id'] . "'>" . "• " . $requisito['nombre'] . "</a><br>";
                                }
                            }

                            // En revisión
                            $sql_requisitos2 = "SELECT * FROM requisitos_bd WHERE epica = '$epica_id' AND estado='en_revision'";
                            $resultado_requisitos2 = $conexion->query($sql_requisitos2);

                            if ($resultado_requisitos2->num_rows > 0) {
                                echo "<h5>EN REVISIÓN</h5>";

                                while($requisito = $resultado_requisitos2->fetch_assoc()) {
                                    echo "<a href='ver_requisito.php?id=" . $requisito['id'] . "'>" . "• " . $requisito['nombre'] . "</a><br>";
                                }
                            }

                            // En desarrollo
                            $sql_requisitos3 = "SELECT * FROM requisitos_bd WHERE epica = '$epica_id' AND estado='en_desarrollo'";
                            $resultado_requisitos3 = $conexion->query($sql_requisitos3);

                            if ($resultado_requisitos3->num_rows > 0) {
                                echo "<h5>EN DESARROLLO</h5>";

                                while($requisito = $resultado_requisitos3->fetch_assoc()) {
                                    echo "<a href='ver_requisito.php?id=" . $requisito['id'] . "'>" . "• " . $requisito['nombre'] . "</a><br>";
                                }
                            }

                            // Finalizados
                            $sql_requisitos4 = "SELECT * FROM requisitos_bd WHERE epica = '$epica_id' AND estado='Finalizado'";
                            $resultado_requisitos4 = $conexion->query($sql_requisitos4);

                            if ($resultado_requisitos4->num_rows > 0) {
                                echo "<h5>FINALIZADOS</h5>";

                                while($requisito = $resultado_requisitos4->fetch_assoc()) {
                                    echo "<a href='ver_requisito.php?id=" . $requisito['id'] . "'>" . "• " . $requisito['nombre'] . "</a><br>";
                                }
                            }
                            
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
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

</body>
</html>