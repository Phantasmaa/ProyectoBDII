$serverName = "nombre_del_servidor"; //Reemplazar con nombre del sevidor
$connectionOptions = array(
    "Database" => "BancoBPU", // Reemplaza con el nombre de la base de datos
    "Uid" => "nombre_de_usuario", // Reemplaza con el nombre de usuario de SQL Server
    "PWD" => "contraseña" // Reemplaza con la contraseña de SQL Server
);

// Establecer la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Ejecutar consultas SQL y procesar los resultados aquí

// Cerrar la conexión
sqlsrv_close($conn);
