require_once 'db_conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DNI_cliente = $_POST['username'];
    $contrasena = $_POST['password'];

    try {
        // Verificar las credenciales en la base de datos
        $query = "SELECT c.DNI_cliente, cl.nom_cliente
                  FROM cuenta c
                  INNER JOIN cliente cl ON c.DNI_cliente = cl.DNI_cliente
                  WHERE c.DNI_cliente = :DNI_cliente AND c.contrasena = :contrasena";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':DNI_cliente', $DNI_cliente);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Las credenciales son válidas, redireccionar al usuario a la página de inicio
            header('Location: index.html');
            exit();
        } else {
            // Las credenciales son inválidas, mostrar un mensaje de error al usuario
            echo "Credenciales inválidas. Por favor, verifique su DNI y contraseña.";
        }
    } catch (PDOException $e) {
        echo "Error de consulta: " . $e->getMessage();
    }
} else {
    echo "Método no permitido.";
}
