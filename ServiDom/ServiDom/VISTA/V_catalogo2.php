<?php
session_start();
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: http://localhost/servidom/ServiDom/VISTA/V_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGO</title>
    <link rel="stylesheet" href="V_catalogo2.css">
</head>
<body>
     <!-- Contenedor para el ícono de perfil y el nombre -->
    <div class="perfil-container">
        <a href="#" class="icono-perfil" id="perfil">
            <img src="imagen/perfil.png" alt="Perfil">
        </a>
        <span class="nombre-perfil"><?php echo htmlspecialchars($_SESSION['nombre_completo']); ?></span>
        <div class="dropdown" id="dropdown">
            <a href="V_perfilPersonal.php">Perfil Personal</a>
            <a href="V_catalogo.php">Cerrar Sesión</a>
        </div>
    </div>
 <!-- Contenedor del catálogo -->
 <div class="container">
    <h1>Catálogo de Ocupaciones</h1>
    <div class="catalogo">
        <!-- Contenido del catálogo -->
        <div class="producto" onclick="abrirPagina('V_Carpiteria.php')">
            <img src="imagen/carpinteria.jpeg" alt="Carpinteria">
            <h3>Carpinteria</h3>
        </div>
        <div class="producto" onclick="abrirPagina('soldadura.php')">
            <img src="imagen/soldador.jpeg" alt="Soldadura">
            <h3>Soldadura</h3>
        </div>
        <div class="producto" onclick="abrirPagina('mecanica.php')">
            <img src="imagen/Mecanica.jpeg" alt="Mecanica">
            <h3>Mecanica</h3>
        </div>
        <div class="producto" onclick="abrirPagina('gasfiteria.php')">
            <img src="imagen/gasfitero.jpeg" alt="Gasfiteria">
            <h3>Gasfiteria</h3>
        </div>
        <div class="producto" onclick="abrirPagina('cerrajeria.php')">
            <img src="imagen/cerrajero.jpeg" alt="Cerrajeria">
            <h3>Cerrajeria</h3>
        </div>
        <div class="producto" onclick="abrirPagina('pintor.php')">
            <img src="imagen/pintor.jpeg" alt="Pintor">
            <h3>Pintor</h3>
        </div>
    </div>
</div>
 <!-- Contenedor de anuncios de empleo -->
 <div class="anuncios-container">
        <h2>Anuncios de Empleo</h2>
        <!-- Anuncios de empleo estarán aquí -->
        <button class="btn-agregar" onclick="mostrarFormulario()">
            <img src="imagen/mas.png" alt="Agregar Anuncio">
        </button>
    </div>
</div>
    <!-- Modal para agregar un nuevo anuncio -->
    <div id="formularioModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarFormulario()">&times;</span>
            <h2>Agregar Nuevo Anuncio</h2>
            <form id="formularioAnuncio">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                <div class="modal-buttons">
                    <button type="button" onclick="agregarAnuncio()">Agregar</button>
                    <button type="button" onclick="cerrarFormulario()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
<script src="Controlador/c_Catalogo2.js"></script>
<script src="Controlador/c_seleccionTrabajador.js"></script>
</body>
</html>