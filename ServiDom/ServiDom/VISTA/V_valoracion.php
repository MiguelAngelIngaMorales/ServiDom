<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALORAR</title>
    <link rel="stylesheet" href="V_valoracion.css">
</head>
<body>
    <div class="contenedor-valoracion">
        <div class="flecha-retroceder">
        <button class="btn-retroceder" onclick="window.history.back();">
            &#8592; Atras
        </div>
        <div class="valoracion">
            <div class="rating-container">
                <h1>Valora nuestro servicio</h1>
                <div class="rating">
                    <span data-value="1">&#9733;</span>
                    <span data-value="2">&#9733;</span>
                    <span data-value="3">&#9733;</span>
                    <span data-value="4">&#9733;</span>
                    <span data-value="5">&#9733;</span>
                </div>
                <textarea id="comment" placeholder="Escribe tu comentario aquí..."></textarea>
            </div>
            <div class="foto-usuario">
                <img src="imagen/perfil.png" alt="Foto de usuario">
            </div>
        </div>
        <div class="buttons">
            <button id="submitRating" class="btn-editar">Enviar Valoración</button>
            <button id="goBack" class="btn-retroceder">Regresar</button>
        </div>
    </div>
    <script src="Controlador/c_Valoracion.js"></script>
</body>
</html>