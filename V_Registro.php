<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí se procesa el formulario de registro
    $tipo_usuario = $_POST['tipo_usuario']; // Esto vendría del formulario

    // Guardar el tipo de usuario en la sesión
    $_SESSION['tipo_usuario'] = $tipo_usuario;

    // Redirigir al perfil personal
    if ($tipo_usuario === 'trabajador') {
        header("Location: ../vista/V_RegistroTrabajador.php");
        exit();
    } elseif($tipo_usuario === 'cliente') {
        header("Location: ../vista/V_RegistroCliente.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a ServiDom</title>
    <link rel="stylesheet" href="V_Registro.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a ServiDom</h1>
        <h2>Seleccione su registro:</h2>
        <div class="botones-registro">
            <button id="btnTrabajador" onclick="redirigirRegistroTrabajador()">Trabajador</button>
            <button id="btnCliente" onclick="redirigirRegistroCliente()">Cliente</button>
        </div>
    </div>
    <script src="Controlador/c_Registrar.js"></script>
</body>
</html>