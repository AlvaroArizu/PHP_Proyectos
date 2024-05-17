<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_avanzado";

// Verificar el código del Captcha
session_start();
if ($_POST['captcha'] == $_SESSION['captcha']) {
    // Captcha correcto, cargar los datos en la base de datos
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $consulta = $_POST['consulta'];

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar datos en la tabla "consultas"
    $sql = "INSERT INTO consultas (nombre, apellido, email, consulta) VALUES ('$nombre', '$apellido', '$email', '$consulta')";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta enviada correctamente.";
    } else {
        echo "Error al enviar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Captcha incorrecto, redireccionar a unidad5.php con un mensaje de error
    header("Location: unidad5.php?error=captcha");
    exit();
}
?>
