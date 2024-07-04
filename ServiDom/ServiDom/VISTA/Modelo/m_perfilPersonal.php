<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: http://localhost/servidom/ServiDom/VISTA/V_login.php");
    exit();
}

// Conectar a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "servidom";

$conexion = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Inicializar variables para evitar errores
$nombre_completo = $telefono = $dni = $correo = $ocupacion = "";

// Obtener el tipo de usuario de la sesión
$tipo_usuario = $_SESSION['tipo_usuario'];

// Obtener datos del usuario
$usuario_id = $_SESSION['usuario_id']; // Asumiendo que tienes almacenado el ID del usuario en la sesión

if ($tipo_usuario === 'cliente') {
    $sql = "SELECT nombre, apellidos, telefono, dni, email FROM CLIENTE WHERE id_cliente = ?";
} else {
    $sql = "SELECT nombre, apellidos, telefono, dni, email, ocupacion FROM TRABAJADOR WHERE id_trabajador = ?";
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
    if ($tipo_usuario === 'trabajador') {
        $ocupacion = htmlspecialchars($datos_usuario['ocupacion']);
    }
} else {
    echo "No se encontraron registros de usuario.";
}

// Verificar si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_apellidos = $_POST['nuevo_apellidos'];
    $nuevo_email = $_POST['nuevo_correo'];
    $nuevo_telefono = $_POST['nuevo_telefono'];
    $nueva_ocupacion = isset($_POST['nueva_ocupacion']) ? $_POST['nueva_ocupacion'] : '';

    // Actualizar la base de datos según el tipo de usuario
    if ($tipo_usuario === 'cliente') {
        $sql = "CALL sp_ActualizarCliente(?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conexion->error;
        } else {
            $stmt->bind_param("issss", $usuario_id, $nuevo_nombre, $nuevo_apellidos, $nuevo_email, $nuevo_telefono);
            if (!$stmt->execute()) {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            } else {
                echo "Datos actualizados correctamente.";
            }
            $stmt->close();
        }
    } else if ($tipo_usuario === 'trabajador') {
        $sql = "CALL sp_ActualizarTrabajador(?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            echo "Error al preparar la consulta: " . $conexion->error;
        } else {
            $stmt->bind_param("isssss", $usuario_id, $nuevo_nombre, $nuevo_apellidos, $nueva_ocupacion, $nuevo_email, $nuevo_telefono);
            if (!$stmt->execute()) {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            } else {
                echo "Datos actualizados correctamente.";
            }
            $stmt->close();
        }
    }
}

$stmt->close();
$conexion->close();
?>
