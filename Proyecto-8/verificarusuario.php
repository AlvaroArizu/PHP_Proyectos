<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conexion = new mysqli("nombre_servidor", "usuario", "contraseña", "nombre_base_de_datos");

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("SELECT password FROM registro WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];

        if (password_verify($password, $stored_password)) {
            echo "Ingreso exitoso. ¡Bienvenido!";
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>
