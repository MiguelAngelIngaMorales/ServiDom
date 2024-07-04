document.addEventListener("DOMContentLoaded", () => {
    // Eliminamos la simulación de datos
    // Simulación de datos del registro de usuarios
    // const usuarios = [
    //     { id: 1, nombre: "Juan", apellido: "Pérez", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 2, nombre: "María", apellido: "López", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 3, nombre: "Carlos", apellido: "García", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 4, nombre: "Ana", apellido: "Martínez", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 5, nombre: "Luis", apellido: "Fernández", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 6, nombre: "Sofía", apellido: "Torres", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 7, nombre: "Miguel", apellido: "Sánchez", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" },
    //     { id: 8, nombre: "Laura", apellido: "Ramírez", imagen: "imagen-placeholder.jpg", perfil: "V_perfil.php" }
    // ];

    const catalogo = document.querySelector('.catalogo');

    // Ahora, los trabajadores se obtienen directamente del archivo PHP
    const productos = document.querySelectorAll('.producto');
    productos.forEach(producto => {
        const btnPerfil = producto.querySelector('.btn-perfil');
        btnPerfil.addEventListener('click', e => {
            e.preventDefault(); // Evitar comportamiento por defecto del enlace
            const perfilURL = btnPerfil.getAttribute('href');
            window.location.href = perfilURL;
        });
    });
});
