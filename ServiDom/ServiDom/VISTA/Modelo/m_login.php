<?php
// Archivo de inicio de sesión (por ejemplo, login.php)
session_start();

// Incluir la conexión a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "servidom";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Código para autenticar al usuario (aquí deberías tener la lógica para verificar las credenciales)
$email = $_POST['email'];
$password = $_POST['contraseña'];

// Verificar si el usuario es un cliente
$sqlCliente = "SELECT id_cliente, nombre, apellidos FROM CLIENTE WHERE email = ? AND contrasena = ?";
$stmtCliente = $conexion->prepare($sqlCliente);
$stmtCliente->bind_param("ss", $email, $password);

// Verificar si el usuario es un trabajador
$sqlTrabajador = "SELECT id_trabajador, nombre, apellidos FROM TRABAJADOR WHERE email = ? AND contrasena = ?";
$stmtTrabajador = $conexion->prepare($sqlTrabajador);
$stmtTrabajador->bind_param("ss", $email, $password);

if ($stmtCliente->execute()) {
    $resultCliente = $stmtCliente->get_result();
    if ($resultCliente->num_rows > 0) {
        $userCliente = $resultCliente->fetch_assoc();
        $_SESSION['usuario_id'] = $userCliente['id_cliente'];
        $_SESSION['nombre_completo'] = $userCliente['nombre'] . ' ' . $userCliente['apellidos'];
        $_SESSION['tipo_usuario'] = 'cliente';
        // Redirigir al perfil personal
        header("Location: http://localhost/servidom/ServiDom/VISTA/V_catalogo2.php");
        exit();
    }
}

if ($stmtTrabajador->execute()) {
    $resultTrabajador = $stmtTrabajador->get_result();
    if ($resultTrabajador->num_rows > 0) {
        $userTrabajador = $resultTrabajador->fetch_assoc();
        $_SESSION['usuario_id'] = $userTrabajador['id_trabajador'];
        $_SESSION['nombre_completo'] = $userTrabajador['nombre'] . ' ' . $userTrabajador['apellidos'];
        $_SESSION['tipo_usuario'] = 'trabajador';
        // Redirigir al perfil personal
        header("Location: http://localhost/servidom/ServiDom/VISTA/V_catalogo2.php");
        exit();
    }
}

// Usuario no encontrado
$_SESSION['error'] = "Credenciales incorrectas.";
header("Location: http://localhost/servidom/ServiDom/VISTA/V_login.php");
exit();

$stmtCliente->close();
$stmtTrabajador->close();
$conexion->close();
?>
