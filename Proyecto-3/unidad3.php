<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>

        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>
    <section>
        <h2>Comentarios</h2>

        <!-- Formulario para ingresar comentarios -->
        <form action="comentarios.php" method="post">
            <label for="nombre_apellido">Nombre y Apellido:</label>
            <input type="text" name="nombre_apellido" id="nombre_apellido" required><br>

            <label for="mail">Mail:</label>
            <input type="email" name="mail" id="mail" required><br>

            <label for="comentario">Comentario:</label>
            <textarea name="comentario" id="comentario" required></textarea><br>

            <input type="submit" value="Enviar Comentario">
        </form>

        <!-- Mostrar comentarios existentes -->
        <?php
        $comentarios = file_get_contents('comentarios.txt');
        if (!empty($comentarios)) {
            echo "<h3>Comentarios anteriores:</h3>";
            echo "<div class='comentarios'>$comentarios</div>";
        }
        ?>
    </section>
    <aside>
    </aside>
    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>
</body>
</html>
