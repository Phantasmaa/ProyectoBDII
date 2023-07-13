<?php
require 'settings.php';
class connection{
    private $conector = null;

    public function getConection()
    {
        $this->conector = new PDO("sqlsrv:server=".SERVIDOR.";database=".DATABASE,USUARIO,PASSWORD);

        return $this->conector;
    }
}

$con = new connection();
if($con->getConection() != null){
   echo "Conexion exitosa";
}
else
{
    echo "Error al conectarse a la base de datos";
} 


?>
