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
    $requisito_id = $_GET['id'];
    $usuarios = "SELECT * FROM requisitos_bd WHERE id='$requisito_id'";
    $resultado = mysqli_query($conexion, $usuarios);
    $info_requisito = $resultado->fetch_assoc();

    $sql_proyecto = "SELECT * FROM proyectos_bd WHERE id = '" . $info_requisito['proyecto_id'] . "'";
    $resultado_proyecto = $conexion->query($sql_proyecto);
    $proyecto = $resultado_proyecto->fetch_assoc();
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

            <a href="bienvenida.php" >
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
            <a href="informacion_proyecto.php?id=<?php echo $proyecto['id']; ?>">
                <div class="option" style="padding-left: 30px;">
                <i class="fa-solid fa-eye" title="Extra Link 1"></i>
                    <h4>Proyecto <?php echo $proyecto['nombre']; ?></h4>
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
            <a href="informacion_proyecto.php?id=<?php echo $info_requisito['proyecto_id']; ?>" class="breadcrumb-link">Proyecto <?php echo $proyecto['nombre']; ?></a>
            <span class="breadcrumb-symbol">></span>
            <a href="requisitos.php?id=<?php echo $info_requisito['proyecto_id']; ?>" class="breadcrumb-link">Requisitos</a>
            <span class="breadcrumb-symbol">></span>
            <a class="breadcrumb-link">Requisito <?php echo $info_requisito['nombre']; ?></a>

        </div>

        <!-- Título con el nombre del requisito -->
        <h1 class="requisito-title"><?php echo $info_requisito['nombre']; ?></h1>

        <!-- Título personalizable -->
        <h3 class="custom-title">Artefactos para el requisito</h3>

        <!-- Contenedor para las 2 columnas -->
        <div class="grid-container">
            <!-- Primera columna -->
            <div class="column">
                <div class="top-half">
                    <h2>Información del Requisito</h2>
                </div>
                <div class="bottom-half" >
                    <p><span class="label2">Nombre:</span> <?php echo $info_requisito['nombre']; ?></p>
                    <p><span class="label2">Descripción:</span> <?php echo $info_requisito['descripcion']; ?></p>
                    <?php
                    $estado_legible = "";
                    switch ($info_requisito['estado']) {
                        case 'en_desarrollo':
                            $estado_legible = "En desarrollo";
                            break;
                        case 'en_revision':
                            $estado_legible = "En revisión";
                            break;
                        case 'propuesto':
                            $estado_legible = "Propuesto";
                            break;
                        case 'Finalizado':
                            $estado_legible = "Finalizado";
                            break;
                        default:
                            $estado_legible = "Desconocido";
                    }
                    ?>
                    <p><span class="label2">Estado:</span> <?php echo $estado_legible; ?></p>
                    <p><span class="label2">Prioridad:</span> <?php echo $info_requisito['prioridad']; ?></p>
                    <p><span class="label2">Complejidad:</span> <?php echo $info_requisito['complejidad']; ?></p>
                    <p><span class="label2">Coste:</span> <?php echo $info_requisito['coste']; ?>€</p>
                    <?php
                        // Obtener el tiempo en horas
                        $horas_totales = $info_requisito['tiempo'];

                        // Calcular días y horas restantes
                        $dias = floor($horas_totales / 24);
                        $horas_restantes = $horas_totales % 24;

                        // Construir el texto
                        $tiempo_texto = "";
                        if ($dias > 0) {
                            $tiempo_texto .= $dias . ($dias == 1 ? " día" : " días");
                        }
                        if ($horas_restantes > 0) {
                            if ($dias > 0) {
                                $tiempo_texto .= " y ";
                            }
                            $tiempo_texto .= $horas_restantes . ($horas_restantes == 1 ? " hora" : " horas");
                        }
                    ?>
                    <p><span class="label2">Tiempo:</span> <?php echo $tiempo_texto; ?></p>
                    <!-- Botón para cambiar el estado -->
                    <form action="php/cambiar_estado.php?id=<?php echo $info_requisito['id']; ?>" id="add_epic_form" method="POST">
                        <div class="form-group-cajas">
                            <label for="estado"><strong>Cambiar estado del requisito:</strong></label>
                            <div class="select-container">
                                <select id="estado" name="estado">
                                    <option value="propuesto" <?php if ($info_requisito['estado'] == 'propuesto') echo 'selected'; ?>>Propuesto</option>
                                    <option value="en_revision" <?php if ($info_requisito['estado'] == 'en_revision') echo 'selected'; ?>>En revisión</option>
                                    <option value="en_desarrollo" <?php if ($info_requisito['estado'] == 'en_desarrollo') echo 'selected'; ?>>En desarrollo</option>
                                    <option value="Finalizado" <?php if ($info_requisito['estado'] == 'Finalizado') echo 'selected'; ?>>FINALIZADO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group centered" style="margin-top: 20px;">
                            <input type="submit" name="cambiar" value="Cambiar" class="submit-button">
                        </div>
                    </form>
                    <!-- Fin del botón de cambio de estado -->
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="column">
                <div class="top-half">
                    <h2>Trazabilidad</h2>
                </div>
                <div class="bottom-half trazabilidad-column">
                    <?php
                    // proyecto
                    echo '<div>Proyecto: ' . $proyecto['nombre'] . '</div>';
                    echo '<div class="arrow-down"></div>';
                    // epica
                    $sql_epicas = "SELECT * FROM epicas_bd WHERE id = '" . $info_requisito['epica'] . "'";
                    $resultado_epicas = $conexion->query($sql_epicas);
                    $epica = $resultado_epicas->fetch_assoc();
                    echo '<div>Épica: ' . $epica['nombre'] . '</div>';
                    echo '<div class="arrow-down"></div>';
                    // requisito
                    echo '<div>Requisito: ' . $info_requisito['nombre'] . '</div>';
                    // Mostrar la flecha apuntando hacia abajo
                    echo '<div class="arrow-down"></div>';
                    // Obtener y mostrar los casos de uso asociados al requisito
                    $sql_casos_uso = "SELECT * FROM casodeuso_bd WHERE requisito_id = '" . $info_requisito['id'] . "'";
                    $resultado_casos_uso = $conexion->query($sql_casos_uso);
                    if ($resultado_casos_uso->num_rows > 0) {
                        echo '<div>Casos de uso: </div>';
                        echo '<ul>';
                        while ($caso_uso = $resultado_casos_uso->fetch_assoc()) {
                            echo '<li>' . $caso_uso['titulo'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<div>No se encontraron casos de uso asociados.</div>';
                    }
                    // Obtener y mostrar los Prototipos asociados al requisito
                    echo '<div class="arrow-down"></div>';
                    $sql_prototipo = "SELECT * FROM prototipo_bd WHERE requisito_id = '" . $info_requisito['id'] . "'";
                    $resultado_prototipo = $conexion->query($sql_prototipo);
                    if ($resultado_prototipo->num_rows > 0) {
                        echo '<div>Prototipos de interfaz de usuario: </div>';
                        echo '<ul>';
                        while ($prototipo = $resultado_prototipo->fetch_assoc()) {
                            echo '<li>' . $prototipo['titulo'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<div>No se encontraron prototipos asociados.</div>';
                    }
                    // Obtener y mostrar los diagramas asociados al requisito
                    echo '<div class="arrow-down"></div>';
                    $sql_diagramas = "SELECT * FROM diagrama_bd WHERE requisito_id = '" . $info_requisito['id'] . "'";
                    $resultado_diagrama = $conexion->query($sql_diagramas);
                    if ($resultado_diagrama->num_rows > 0) {
                        echo '<div>Diagramas de clases: </div>';
                        echo '<ul>';
                        while ($diagrama = $resultado_diagrama->fetch_assoc()) {
                            echo '<li>' . $diagrama['titulo'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<div>No se encontraron diagramas asociados.</div>';
                    }
                    // Obtener y mostrar los casos de prueba asociados al requisito
                    echo '<div class="arrow-down"></div>';
                    $sql_prueba = "SELECT * FROM paso_paso_bd WHERE requisito_id = '" . $info_requisito['id'] . "'";
                    $resultado_prueba = $conexion->query($sql_prueba);
                    if ($resultado_prueba->num_rows > 0) {
                        echo '<div>Casos de prueba: </div>';
                        echo '<ul>';
                        while ($prueba = $resultado_prueba->fetch_assoc()) {
                            echo '<li>' . $prueba['titulo'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<div>No se encontraron casos de prueba asociados.</div>';
                    }
                    ?>
                </div>
            </div>
            
            <!-- Contenedor para el menú desplegable y el formulario -->
            <div class="select-container">
                <!-- Menú desplegable -->
                <select id="formSelector">
                    <option value="" selected disabled>Añadir: </option>
                    <option value="formulario1">Caso de uso</option>
                    <option value="formulario2">Prototipo de interfaz de usuario</option>
                    <option value="formulario3">Diagrama de clases</option>
                    <option value="formulario4">Caso de prueba</option>
                </select>
                
                <!-- Contenedor para mostrar los formularios -->
                <div class="form-container" id="formularioContenedor">
                    <!-- Formulario 1 -->
                    <form id="formulario1" action="php/guardar_caso_uso.php?id=<?php echo $info_requisito['id']; ?>" method="POST"style="display: none;">
                        <div style="text-align: center;"> <!-- Centrar el contenido -->
                            <h3>Nuevo Caso de Uso</h3>
                        </div>
                        <div style="width: 80%; margin: 0 auto;">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" id="titulo" name="titulo" required style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" rows="4" required style="width: 100%;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="actores">Actores:</label>
                                <textarea id="actores" name="actores" rows="2" required style="width: 100%;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="flujo_basico">Flujo básico:</label>
                                <textarea id="flujo_basico" name="flujo_basico" rows="5" placeholder="Escribe el flujo básico paso a paso..." style="width: 100%;"></textarea>
                            </div>
                            <div class="form-group centered" style="margin-top: 20px;">
                                <input type="submit" name="crear" value="Crear" class="submit-button">
                            </div>
                        </div>
                    </form>

                    <!-- Formulario 2 -->
                    <form id="formulario2" action="php/guardar_prototipo.php?id=<?php echo $info_requisito['id']; ?>" method="POST"style="display: none;" enctype="multipart/form-data">
                        <div style="text-align: center;"> <!-- Centrar el contenido -->
                            <h3>Nuevo Prototipo</h3>
                        </div>
                        <div style="width: 80%; margin: 0 auto;">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" id="titulo" name="titulo" required style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" rows="4" required style="width: 100%;"></textarea>
                            </div>
                            <!-- Campo para la foto del paso 1 -->
                            <div class="form-group" id="pasos_fotos">
                                <div class="paso_foto">
                                    <label for="foto_paso_1">Foto paso 1:</label>
                                    <input type="file" id="foto_paso_1" name="foto_paso_1" accept="image/*" required>
                                    <input type="text" id="paso_1" name="paso_1" placeholder="Paso 1" required>
                                </div>
                            </div>
                            <div class="form-group centered" style="margin-top: 20px;">
                                <button type="button" id="btn_add_photo">Añadir paso</button>
                            </div> 
                            <div class="form-group centered" style="margin-top: 20px;">
                                <input type="submit" name="crear" value="Crear" class="submit-button">
                            </div>
                        </div>
                    </form>

                    <!-- Formulario 3 -->
                    <form id="formulario3" action="php/guardar_diagrama.php?id=<?php echo $info_requisito['id']; ?>" method="POST"style="display: none;" enctype="multipart/form-data">
                        <div style="text-align: center;"> <!-- Centrar el contenido -->
                            <h3>Nuevo Diagrama de clases</h3>
                        </div>
                        <div style="width: 80%; margin: 0 auto;">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" id="titulo" name="titulo" required style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" rows="4" required style="width: 100%;"></textarea>
                            </div>
                            <!-- Campo para la foto del paso 1 -->
                            <div class="form-group" id="pasos_fotos">
                                <div class="paso_foto">
                                    <label for="foto_paso_1">Foto diagrama:</label>
                                    <input type="file" id="foto_paso_1" name="foto_paso_1" accept="image/*" required>
                                </div>
                            </div>

                            <div class="form-group centered" style="margin-top: 20px;">
                                <input type="submit" name="crear" value="Crear" class="submit-button">
                            </div>
                        </div>
                    </form>

                    <!-- Formulario 4 -->
                    <form id="formulario4" action="php/guardar_casodeprueba.php?id=<?php echo $info_requisito['id']; ?>" method="POST"style="display: none;" enctype="multipart/form-data">
                        <div style="text-align: center;"> <!-- Centrar el contenido -->
                            <h3>Nuevo Caso de prueba</h3>
                        </div>
                        <div style="width: 80%; margin: 0 auto;">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" id="titulo" name="titulo" required style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" rows="4" required style="width: 100%;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="paso_paso">Paso a paso:</label>
                                <textarea id="paso_paso" name="paso_paso" rows="5" placeholder="Escribe el paso a paso del caso de prueba..." style="width: 100%;"></textarea>
                            </div>
                            <!-- Campo para la foto del paso 1 -->
                            <div class="form-group" id="pasos_fotos">
                                <div class="paso_foto">
                                    <label for="foto_paso_1">Adjunta imagen:</label>
                                    <input type="file" id="foto_paso_1" name="foto_paso_1" accept="image/*" required>
                                </div>
                            </div>
                            <div class="form-group centered" style="margin-top: 20px;">
                                <input type="submit" name="crear" value="Crear" class="submit-button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

    </main>

    <script src="assets/js/proyectos.js"></script>
    <script>
        // Función para mostrar el formulario seleccionado
        document.getElementById('formSelector').addEventListener('change', function() {
            var selectedForm = this.value;
            var formularios = document.querySelectorAll('#formularioContenedor form');
            
            // Oculta todos los formularios
            formularios.forEach(function(formulario) {
                formulario.style.display = 'none';
            });
            
            // Muestra el formulario seleccionado
            document.getElementById(selectedForm).style.display = 'block';
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var btnAddPhoto = document.getElementById("btn_add_photo");
            var pasosFotos = document.getElementById("pasos_fotos");
            var count = 1;

            btnAddPhoto.addEventListener("click", function() {
                count++;

                var divPasoFoto = document.createElement("div");
                divPasoFoto.className = "paso_foto";

                var label = document.createElement("label");
                label.htmlFor = "foto_paso_" + count;
                label.textContent = "Foto paso " + count + ":";

                var inputFoto = document.createElement("input");
                inputFoto.type = "file";
                inputFoto.id = "foto_paso_" + count;
                inputFoto.name = "foto_paso_" + count;
                inputFoto.accept = "image/*";
                inputFoto.required = true;

                var inputPaso = document.createElement("input");
                inputPaso.type = "text";
                inputPaso.id = "paso_" + count;
                inputPaso.name = "paso_" + count;
                inputPaso.placeholder = "Paso " + count;
                inputPaso.required = true;

                divPasoFoto.appendChild(label);
                divPasoFoto.appendChild(inputFoto);
                divPasoFoto.appendChild(inputPaso);

                pasosFotos.appendChild(divPasoFoto);
            });
        });
    </script>


</body>
</html>