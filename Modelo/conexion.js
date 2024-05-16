const mysql = require('mysql');

// Configuración de la conexión a la base de datos
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'usuario',
    password: 'contraseña',
    database: 'nombre_de_la_base_de_datos'
});

// Conectar a la base de datos
connection.connect((err) => {
    if (err) {
        console.error('Error al conectar a la base de datos: ' + err.stack);
        return;
    }
    console.log('Conexión a la base de datos establecida con el ID ' + connection.threadId);
});

// Exportar la conexión para que pueda ser utilizada en otros archivos
module.exports = connection;
