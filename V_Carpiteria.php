<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecion</title>
    <link rel="stylesheet" href="V_Carpiteria.css">
</head>
<body>
    <div class="container">
        <button class="btn-retroceder" onclick="window.history.back();">
            &#8592; Retroceder
        </button>
        <h1>Lista de carpinteros</h1>
        <div class="content">
            <div class="sidebar">
                <h2>Categorías</h2>
                <ul>
                    <li><a href="#">Elaboración de muebles</a></li>
                    <li><a href="#">Armado de muebles</a></li>
                    <li><a href="#">Reparación de muebles</a></li>
                    <li><a href="#">Revestimiento de mobiliario</a></li>
                </ul>
            </div>
            <div class="linea-vertical"></div>
            <div class="catalogo" id="catalogo">
                <?php include_once 'Modelo/m_carpinteria.php'; ?>
                <?php foreach ($trabajadores as $trabajador): ?>
                    <div class="producto">
                        <img src="<?php echo $trabajador['imagen']; ?>" alt="Imagen de <?php echo $trabajador['nombre'] . ' ' . $trabajador['apellido']; ?>">
                        <h3><?php echo $trabajador['nombre'] . ' ' . $trabajador['apellido']; ?></h3>
                        <a class="btn-perfil" href="v_perfil.php?id=<?php echo $trabajador['id']; ?>">
                            <img src="icono-perfil.png" alt="Perfil">
                            <span>Ver perfil</span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <script src="Controlador/c_carpinteria.js"></script>
    </div>
</body>
</html>