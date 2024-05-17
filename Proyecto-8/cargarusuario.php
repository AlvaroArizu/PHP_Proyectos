<?php
class Usuario {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function guardarEnBaseDeDatos() {
        $conexion = new mysqli("nombre_servidor", "usuario", "contraseña", "nombre_base_de_datos");

        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        $stmt = $conexion->prepare("INSERT INTO registro (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->email, $this->password);

        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $usuario = new Usuario($email, $password);
    $usuario->guardarEnBaseDeDatos();
}
?>
