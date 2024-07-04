<?php
session_start(); // Iniciar sesión si aún no se ha hecho
require_once "conexion.php"; // Incluir archivo de conexión a la base de datos

// Inicializar variables para evitar errores
$nombre_completo = $telefono = $dni = $correo = $ocupacion = "";

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener el tipo de usuario de la sesión
$tipo_usuario = $_SESSION['tipo_usuario'];

// Obtener datos del usuario
$usuario_id = $_SESSION['usuario_id']; // Asumiendo que tienes almacenado el ID del usuario en la sesión

if ($tipo_usuario === 'trabajador') {
    $sql = "SELECT nombre, apellidos, telefono, dni, email, ocupacion FROM TRABAJADOR WHERE id_trabajador = ?";
} else {
    // Manejar otra lógica o no hacer nada si no aplica para este contexto
}

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $datos_usuario = $resultado->fetch_assoc();
    // Asignar los datos del usuario a variables PHP
    $nombre_completo = htmlspecialchars($datos_usuario['nombre'] . ' ' . $datos_usuario['apellidos']);
    $telefono = htmlspecialchars($datos_usuario['telefono']);
    $dni = htmlspecialchars($datos_usuario['dni']);
    $correo = htmlspecialchars($datos_usuario['email']);
    $ocupacion = htmlspecialchars($datos_usuario['ocupacion']);
} else {
    echo "No se encontraron registros de trabajador.";
}

$stmt->close();
$conexion->close();
?>
