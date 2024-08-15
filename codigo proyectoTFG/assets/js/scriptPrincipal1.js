//Ejecutar función en el evento click
document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        body.classList.toggle("body_move");
        side_menu.classList.toggle("menu__side_move");
    }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

//Haciendo el menú responsive(adaptable)

window.addEventListener("resize", function(){

    if (window.innerWidth > 760){

        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }

});

document.addEventListener('DOMContentLoaded', function() {
    var userInfo = document.getElementById('user-info');
    var closeButton = null; // Variable para almacenar el botón de "Cerrar Sesión"

    userInfo.addEventListener('click', function() {
        // Si closeButton no está creado, se crea y se agrega al contenedor
        if (!closeButton) {
            closeButton = document.createElement('button');
            closeButton.innerText = 'Cerrar Sesión';
            closeButton.classList.add('close-button');

            closeButton.addEventListener('click', function() {
                // Por ejemplo, redirigir a una página de inicio de sesión
                alert('Cerrando sesión...');
            });

            // Crear enlace
            var logoutLink = document.createElement('a');
            logoutLink.href = 'php/cerrar_sesion.php'; 
            logoutLink.appendChild(closeButton); // Agregar botón al enlace

            userInfo.appendChild(logoutLink); // Agregar enlace al contenedor
        } else {
            // Si closeButton ya está creado, se elimina del contenedor
            userInfo.removeChild(closeButton.parentNode);
            closeButton = null; // Reiniciamos closeButton para la próxima vez
        }
    });
});

// Obtén el enlace del blog y los enlaces adicionales
var blogLink = document.getElementById("blog_link");
var extraLinks = document.getElementById("extra_links");

// Agrega un evento de clic al enlace del blog
blogLink.addEventListener("click", function(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
    
    // Alternar la visibilidad de los enlaces adicionales
    if (extraLinks.style.display === "none") {
        extraLinks.style.display = "block";
    } else {
        extraLinks.style.display = "none";
    }
});

// Obtén el enlace del blog y los enlaces adicionales
var blogLink2 = document.getElementById("blog_link2");
var extraLinks2 = document.getElementById("extra_links2");

// Agrega un evento de clic al enlace del blog
blogLink2.addEventListener("click", function(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
    
    // Alternar la visibilidad de los enlaces adicionales
    if (extraLinks2.style.display === "none") {
        extraLinks2.style.display = "block";
    } else {
        extraLinks2.style.display = "none";
    }
});

// Obtén el enlace del blog y los enlaces adicionales
var blogLink3 = document.getElementById("blog_link3");
var extraLinks3 = document.getElementById("extra_links3");

// Agrega un evento de clic al enlace del blog
blogLink3.addEventListener("click", function(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
    
    // Alternar la visibilidad de los enlaces adicionales
    if (extraLinks3.style.display === "none") {
        extraLinks3.style.display = "block";
    } else {
        extraLinks3.style.display = "none";
    }
});


