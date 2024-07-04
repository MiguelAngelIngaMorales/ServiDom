<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tipo_usuario'])) {
    $tipo_usuario = $_POST['tipo_usuario'];

    // Establecer la sesión con el tipo de usuario seleccionado
    $_SESSION['tipo_usuario'] = $tipo_usuario;

    // Redirigir según el tipo de usuario
    if ($tipo_usuario === 'trabajador') {
        header("Location: ../vista/V_RegistroTrabajador.php");
        exit();
    } elseif ($tipo_usuario === 'cliente') {
        header("Location: ../vista/V_RegistroCliente.php");
        exit();
    } else {
        // Manejo de caso no esperado
        echo "Tipo de usuario no válido.";
        exit();
    }
} else {
    // Manejo de caso no esperado
    echo "No se recibió el tipo de usuario correctamente.";
    exit();
}
?>
