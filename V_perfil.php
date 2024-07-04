<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="V_perfil.css">
</head>
<body>
    <div class="contenedor-perfil">
        <button class="btn-retroceder" onclick="window.history.back();">
            &#8592; Atrás
        </button>
        <div class="perfil">
            <?php if (!empty($nombre_completo) && !empty($telefono) && !empty($dni) && !empty($correo) && !empty($ocupacion)): ?>
                <div class="datos-usuario">
                    <h1>Información del Trabajador</h1>
                    <p>Nombre y Apellido: <?php echo $nombre_completo; ?></p>
                    <p>Teléfono: <?php echo $telefono; ?></p>
                    <p>DNI: <?php echo $dni; ?></p>
                    <p>Ocupación: <?php echo $ocupacion; ?></p>
                    <p>Correo: <?php echo $correo; ?></p>
                    <div class="acciones">
                        <a href="#" class="btn-solicitar-trabajor" onclick="desactivarBoton(this)">Solicitar empleo</a>
                        <a href="V_chat.php" class="btn-enviar-mensaje">Enviar Mensaje</a>
                        <a href="V_valoracion.php" class="btn-valorizar-servicio">Valorizar Servicio</a>
                    </div>
                </div>
                <div class="foto-usuario">
                    <img src="imagen/perfil.png" alt="Foto de usuario">
                </div>
            <?php else: ?>
                <p>No se encontraron datos del trabajador.</p>
            <?php endif; ?>
        </div>
        <script src="Controlador/c_perfil.js"></script>
    </div>
</body>
</html>
