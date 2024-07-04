<?php include 'Modelo/m_perfilPersonal.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL-PERSONAL</title>
    <link rel="stylesheet" href="V_perfilPersonal.css">
</head>
<body>
    <div class="contenedor-perfil">
        <div class="flecha-retroceder">
            <button id="btn-retroceder" class="btn-retroceder">&larr; Volver</button>
        </div>
        <div class="perfil">
            <div class="datos-usuario">
                <h1>Información</h1>
                <p>Nombre y Apellido: <?php echo htmlspecialchars($nombre_completo); ?></p>
                <p>Teléfono: <?php echo htmlspecialchars($telefono); ?></p>
                <p>DNI: <?php echo htmlspecialchars($dni); ?></p>
                <?php if ($tipo_usuario === 'trabajador'): ?>
                <p>Ocupación: <?php echo htmlspecialchars($ocupacion); ?></p>
                <?php endif; ?>
                <p>Correo: <?php echo htmlspecialchars($correo); ?></p>
                <div class="acciones">
                    <button id="btn-editar" class="btn-editar">Editar Perfil</button>
                </div>
            </div>
            <div class="foto-usuario">
                <img src="imagen/perfil.png" alt="Foto de usuario">
            </div>
        </div>
    </div>
    <div id="form-editar-container" class="form-editar-container oculto">
        <form id="form-editar" class="form-editar" action="m_perfilPersonal.php" method="POST">
            <h2>Actualizar Información</h2>
            <input type="text" name="nuevo_nombre" placeholder="Nuevo Nombre" value="">
            <input type="text" name="nuevo_apellidos" placeholder="Nuevo Apellido" value="">
            <input type="text" name="nuevo_telefono" placeholder="Nuevo Teléfono" value="">
            <?php if ($tipo_usuario === 'trabajador'): ?>
            <input type="text" name="nueva_ocupacion" placeholder="Nueva Ocupación" value="">
            <?php endif; ?>
            <input type="text" name="nuevo_correo" placeholder="Nuevo Correo" value="">
            <div class="acciones-formulario">
                <button type="button" id="btn-cancelar" class="btn-cancelar">Cancelar</button>
                <button type="submit" id="btn-guardar" class="btn-guardar">Guardar Cambios</button>
            </div>
        </form>
    </div>
    <script src="Controlador/c_perfilPersonal.js"></script>
</body>
</html>
