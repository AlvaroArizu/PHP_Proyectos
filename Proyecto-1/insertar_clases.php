<?php
// Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unidad = $_POST["unidad"];
    $fecha = $_POST["fecha"];

    // Conectar con la base de datos
    $servername = "localhost";
    $username = "tu_usuario_mysql";
    $password = "tu_contraseña_mysql";
    $dbname = "phpavanzado"; // Asegúrate de usar el nombre correcto de la base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la tabla "clases"
    $sql = "INSERT INTO clases (unidad, fecha) VALUES ('$unidad', '$fecha')";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a unidad1.php
        header("Location: unidad1.php");
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
