<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGO</title>
    <link rel="stylesheet" href="V_catalogo.css">
</head>
<body> 
   <!-- Botón de inicio de sesión -->
   <a href="V_login.php" class="btn-sesion">Iniciar Sesión</a>

   <!-- Contenedor del catálogo -->
   <div class="container">
       <h1>Catálogo de Ocupaciones</h1>
       <div class="catalogo">
           <!-- Contenido del catálogo -->
           <div class="producto" onclick="abrirPagina('V_carpiteria.php')">
               <img src="imagen/carpinteria.jpeg" alt="Carpinteria">
               <h3>Carpinteria</h3>
           </div>
           <div class="producto" onclick="abrirPagina('soldadura.html')">
               <img src="imagen/soldador.jpeg" alt="Soldadura">
               <h3>Soldadura</h3>
           </div>
           <div class="producto" onclick="abrirPagina('mecanica.html')">
               <img src="imagen/Mecanica.jpeg" alt="Mecanica">
               <h3>Mecanica</h3>
           </div>
           <div class="producto" onclick="abrirPagina('gasfiteria.html')">
               <img src="imagen/gasfitero.jpeg" alt="Gasfiteria">
               <h3>Gasfiteria</h3>
           </div>
           <div class="producto" onclick="abrirPagina('cerrajeria.html')">
               <img src="imagen/cerrajero.jpeg" alt="Cerrajeria">
               <h3>Cerrajeria</h3>
           </div>
           <div class="producto" onclick="abrirPagina('pintor.html')">
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
    <script src="Controlador/c_Catalogo.js"></script>
</body>
</html>