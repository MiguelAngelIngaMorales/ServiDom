<?php
// Lógica para conectar a la base de datos y obtener datos de los trabajadores
$server = "localhost";
$user = "root";
$password = "";
$database = "servidom";

// Conexión a la base de datos
$conexion = new mysqli($server, $user, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener los trabajadores
$sql = "SELECT id_trabajador, nombre, apellidos FROM TRABAJADOR";
$resultado = $conexion->query($sql);

// Arreglo para almacenar los trabajadores
$trabajadores = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $trabajadores[] = [
            'id' => $fila['id_trabajador'],
            'nombre' => $fila['nombre'],
            'apellido' => $fila['apellidos'],
        ];
    }
}

// Cerrar conexión
$conexion->close();
?>
