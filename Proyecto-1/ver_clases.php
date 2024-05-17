<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <section>
            <h2>Lista de Clases</h2>
            <?php
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

            // Consultar y mostrar los datos de la tabla "clases"
            $sql = "SELECT id_clase, unidad, fecha FROM clases";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID Clase</th><th>Unidad</th><th>Fecha</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id_clase"] . "</td><td>" . $row["unidad"] . "</td><td>" . $row["fecha"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No hay clases registradas.";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </section>
    </div>
</body>
</html>
