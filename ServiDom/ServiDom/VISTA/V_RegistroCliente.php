<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRARSE-CLIENTE</title>
    <link rel="stylesheet" href="V_RegistroCliente.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Cliente</h1>
        <form action="Modelo/m_registroCliente.php" method="post">
            <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
            <input type="text" placeholder="Apellido" id="apellido" name="apellido" required>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <input type="text" placeholder="DNI" id="dni" name="dni" required>
            <input type="tel" placeholder="Telefono" id="telefono" name="telefono" pattern="[0-9]{9}" required>
            <input type="password" placeholder="Contraseña" id="password" name="password" required>
            <input type="password" placeholder="Confirmas-Contraseña" id="confirmar-password" name="confirmar-password" required>
            <div id="errorContainer" class="error"></div>
           <input type="submit" class="btn" value="Registrar" onclick="validarRegistroCliente()">
        </form>
    </div>
    <script src="Controlador/c_RegistroCliente.js"></script>
</body>
</html>