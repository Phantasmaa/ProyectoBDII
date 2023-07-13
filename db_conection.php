$servername = 'nombre_del_servidor';
$database = 'BancoBPU';
$username = 'nombre_de_usuario';
$password = 'contraseña';

try {
  $conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
