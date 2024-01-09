<?php
// Importa la clase Database si no lo has hecho ya
require 'database.php';

//Importa configuracion
require 'config.php';

// Crea una instancia de la clase Database
$db = new Database();

// Establece la conexión a la base de datos
$con = $db->conectar(); 

if ($con) {
    // Consulta para obtener las carreras desde la base de datos
    $sql = "SELECT nombre FROM licenciaturas";
    
    try {
        $stmt = $con->query($sql);
        $carreras = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($carreras);
    } catch (PDOException $e) {
        echo "Error al obtener las carreras: " . $e->getMessage();
    }
} else {
    echo "Error de conexión a la base de datos";
}
?>