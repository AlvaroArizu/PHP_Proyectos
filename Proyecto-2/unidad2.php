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
    </header>
    <nav>
        <?php include("botonera.php"); ?>
    </nav>
    </header>
    <section>
        <h2>Eventos</h2>
        <form action="calculo_fecha.php" method="post">
            <label for="dia">Día:</label>
            <input type="number" name="dia" id="dia" required>
            <label for="mes">Mes:</label>
            <input type="number" name="mes" id="mes" required>
            <label for "año">Año:</label>
            <input type="number" name="año" id="año" required>
            <button type="submit">Calcular</button>
        </form>
        <?php
        if (isset($_GET['resultado'])) {
            echo '<div class="resultado">';
            echo '<h3>Resultado del cálculo</h3>';
            echo '<p>' . str_replace(", ", "<br>", $_GET['fecha']) . '</p>';
            echo '</div>';
        }
        ?>
    </section>
    <aside></aside>
    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>
</body>
</html>


