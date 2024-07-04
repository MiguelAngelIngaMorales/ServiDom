<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
    <link rel="stylesheet" href="V_chat.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <button class="back-button" onclick="goBack()">&larr;</button>
            <div class="header-info">
                <img src="imagen/perfil.png" alt="Perfil" class="profile-pic">
                <h1>Nombre del Usuario</h1>
            </div>
        </div>
        <div class="chat-box" id="chat-box"></div>
        <div class="input-container">
            <input type="text" id="message-input" placeholder="Escribe un mensaje...">
            <button id="send-button">Enviar</button>
        </div>
    </div>
    <script src="Controlador/c_chat.js"></script>
</html>