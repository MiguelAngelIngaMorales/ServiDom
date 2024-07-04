<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTARSE-EMPLEADO</title>
    <link rel="stylesheet" href="V_RegistroTrabajador.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Trabajador</h1>
        <form action="Modelo/m_registroTrabajador.php" method="post">
            <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
            <input type="text" placeholder="Apellido" id="apellido" name="apellido" required>
            <input type="text" placeholder="Ocupación" id="ocupacion" name="ocupacion" required>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <input type="text" placeholder="DNI" id="dni" name="dni" required>
            <input type="tel" placeholder="Teléfono" id="telefono" name="telefono" pattern="[0-9]{9}" required>
            <input type="password" placeholder="Contraseña" id="password" name="password" required>
            <input type="password" placeholder="Confirmar Contraseña" id="confirmar-password" name="confirmar-password" required>
            <label for="foto">Adjuntar Foto:</label>
            <input type="file" id="foto" name="foto">
            <div id="errorContainer" class="error"></div>
            <input type="submit" class="btn" value="Registrar" onclick="validarRegistroTrabajador()">
        </form>
    </div>
    <script src="Controlador/c_RegistroTrabajador.js"></script>
</body>
</html>
