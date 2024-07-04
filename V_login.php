<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="V_login.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SERVIDOM</h1>
        </div>
        <form action="Modelo/m_login.php" method="post" id="loginForm">
            <input type="email" placeholder="Correo electrónico" id="email" name="email" required>
            <input type="password" placeholder="Contraseña" id="contraseña" name="contraseña" required>
            <label>
                <input type="checkbox" onclick="mostrarContraseña()"> Mostrar Contraseña
            </label>
            <a href="#" class="olvidaste-contraseña">¿Olvidaste tu contraseña?</a>
            <button type="submit" onclick="validarFormulario()">Iniciar Sesión</button>
            <div id="error" class="error-message">
            <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </div> <!-- Mensaje de error -->
        </form>
        <div class="separator"></div>
        <div class="crear-cuenta">
            <a href="V_Registro.php" class="crear-cuenta-link">Registrarse</a>
        </div>
    </div>
    <script src="Controlador/c_login.js"></script>
</body>
</html>