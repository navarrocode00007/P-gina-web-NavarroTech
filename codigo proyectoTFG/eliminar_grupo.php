<?php
session_start();
include 'php/conexion_be.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Obtén el ID del proyecto a eliminar
    $idProyecto = $_POST['id'];

    // Prepara y ejecuta la consulta SQL para eliminar el proyecto
    $sql = "DELETE FROM grupos_bd WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $idProyecto);
    if ($stmt->execute()) {
        // Proyecto eliminado correctamente
        echo 'OK';
    } else {
        // Error al eliminar el proyecto
        echo 'Error';
    }
} else {
    // Si no se reciben datos POST o no se proporciona el ID del proyecto, devuelve un error
    echo 'Error';
}
?>