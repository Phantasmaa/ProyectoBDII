<?php
require 'settings.php';
require_once 'db_conection.php';


if (isset($_SESSION['dni'])) {
  $DNI_cliente = $_SESSION['dni']; 
} else {
  
  header('Location: login.html');
  exit();
}

try {
  // Obtener información del estado de cuenta del cliente
  $query = "SELECT c.nro_cuenta, c.saldo, t.importe AS ultimo_egreso, d.importe AS ultimo_ingreso
            FROM cuenta c
            LEFT JOIN transferencia t ON c.nro_cuenta = t.nro_cuenta
            LEFT JOIN depósito d ON c.nro_cuenta = d.nro_cuenta
            WHERE c.DNI_cliente = :DNI_cliente
            ORDER BY t.fecha DESC, d.fecha DESC
            LIMIT 1";

  $stmt = $conn->prepare($query);
  $stmt->bindParam(':DNI_cliente', $DNI_cliente);
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

  // Obtener los valores de los campos obtenidos en la consulta
  $nro_cuenta = $resultado['nro_cuenta'];
  $saldo = $resultado['saldo'];
  $ultimo_egreso = $resultado['ultimo_egreso'];
  $ultimo_ingreso = $resultado['ultimo_ingreso'];

  // Devolver los datos como una respuesta JSON
  $response = array(
    'nro_cuenta' => $nro_cuenta,
    'saldo' => $saldo,
    'ultimo_egreso' => $ultimo_egreso,
    'ultimo_ingreso' => $ultimo_ingreso
  );

  header('Content-Type: application/json');
  echo json_encode($response);
} catch (PDOException $e) {
  echo "Error de consulta: " . $e->getMessage();
}
?>
