<?php
// Conexión a la base de datos
$db = new mysqli("localhost", "root", "", "fysmx");
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Obtención de los datos del formulario
$opinion = isset($_POST["opinion"]) ? $_POST["opinion"] : "";
$calificacion = isset($_POST["calificacion"]) ? $_POST["calificacion"] : "";
$nombre_licenciatura = isset($_POST["nombre_licenciatura"]) ? $_POST["nombre_licenciatura"] : "";

// Validación y sanitización de los datos
$opinion = filter_var($opinion, FILTER_SANITIZE_STRING);
$calificacion = filter_var($calificacion, FILTER_SANITIZE_NUMBER_INT);
$nombre_licenciatura = filter_var($nombre_licenciatura, FILTER_SANITIZE_STRING);

// Búsqueda del id de la licenciatura
$query1 = "SELECT id
FROM licenciaturas
WHERE nombre = '{$nombre_licenciatura}';";
$resultado = $db->query($query1);

// Obtención del id
$id_licenciatura = $resultado->fetch_assoc()['id'];

// Preparación de la consulta SQL
$query = "INSERT INTO opiniones (opinion, calificacion, id_licenciatura) VALUES (?, ?, ?)";
$stmt = $db->prepare($query);

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die('Error de preparación: ' . $db->error);
}

// Vinculación de los valores
$stmt->bind_param("ssi", $opinion, $calificacion, $id_licenciatura);

// Ejecución de la consulta
$resultado = $stmt->execute();

// Envío de comentarios al usuario
if ($resultado) {
    // Comentarios exitosos
    echo '<script>
            window.onload = function() {
                alert("Gracias por tu opinión. Se ha guardado correctamente.");
            };
          </script>';
} else {
    // Comentarios fallidos
    echo "Hubo un error al guardar la opinión. Por favor, vuelve a intentarlo.";
}

// Cierre de la conexión a la base de datos
$stmt->close();
$db->close();
?>
