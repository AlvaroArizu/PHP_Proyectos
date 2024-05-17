<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
  <style>
    /* Estilos específicos para unidad5.php */
    .captcha-img {
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 10px;
    }
  </style>
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
      <h2>Consultas</h2>
      <?php
      // Mostrar mensaje de error si el captcha es incorrecto
      if (isset($_GET['error']) && $_GET['error'] == 'captcha') {
        echo '<p style="color: red;">Error: Captcha incorrecto. Intenta de nuevo.</p>';
      }
      ?>
      <form action="cargar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="consulta">Consulta:</label>
        <textarea id="consulta" name="consulta" rows="4" required></textarea>

        <!-- Indicación de la operación matemática para el captcha -->
        <p>Por favor, resuelve la siguiente operación: 2 + 2</p>

        <!-- Captcha -->
        <div class="captcha">
          <label for="captcha">Respuesta de la operacion: </label>
          <img src="captcha.php" alt="Captcha" class="captcha-img">
          <input type="text" id="captcha" name="captcha" required>
        </div>

        <input type="submit" value="Enviar Consulta">
      </form>
    </section>
    <aside>
    </aside>
    <footer>
      <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
  </div>
</body>
</html>
