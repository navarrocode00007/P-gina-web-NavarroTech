document.addEventListener('DOMContentLoaded', function() {
    // Escucha clics en los botones "Eliminar"
    var botonesEliminar = document.querySelectorAll('.eliminar-proyecto');
    botonesEliminar.forEach(function(boton) {
        boton.addEventListener('click', function() {
            var idProyecto = this.getAttribute('data-id');
            if (confirm('¿Estás seguro de que quieres eliminar este proyecto?')) {
                eliminarProyecto(idProyecto);
            }
        });
    });

    // Función para eliminar el proyecto mediante AJAX
    function eliminarProyecto(idProyecto) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Proyecto eliminado correctamente, puedes recargar la página o actualizar la lista de proyectos
                    location.reload();
                } else {
                    // Manejar errores si es necesario
                    console.error('Error al eliminar el proyecto');
                }
            }
        };
        xhr.open('POST', 'eliminar_proyecto.php'); // Ruta al script PHP para eliminar el proyecto
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + encodeURIComponent(idProyecto)); // Enviar el ID del proyecto como parámetro
    }
});