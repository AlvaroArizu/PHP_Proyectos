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
        <h2>Imágenes con PHP</h2>

        <h3>Marca de Agua en php.png</h3>
        <?php
        // Ruta de la imagen original
        $imagenOriginal = 'php.png';
        
        // Cargar la imagen original
        $imagen = imagecreatefromjpeg($imagenOriginal);
        
        // Ruta de la imagen de la marca de agua
        $marcaDeAgua = 'marca.png';
        
        // Cargar la imagen de la marca de agua
        $marca = imagecreatefrompng($marcaDeAgua);
        
        // Obtener las dimensiones de la imagen original
        list($ancho, $alto) = getimagesize($imagenOriginal);
        
        // Obtener las dimensiones de la marca de agua
        list($anchoMarca, $altoMarca) = getimagesize($marcaDeAgua);
        
        // Calcular la posición para la marca de agua (por ejemplo, centrada)
        $x = ($ancho - $anchoMarca) / 2;
        $y = ($alto - $altoMarca) / 2;
        
        // Aplicar la marca de agua a la imagen original
        imagecopy($imagen, $marca, $x, $y, 0, 0, $anchoMarca, $altoMarca);
        
        // Mostrar la imagen original con marca de agua
        header('Content-Type: image/jpeg');
        imagejpeg($imagen);
        
        // Liberar la memoria
        imagedestroy($imagen);
        imagedestroy($marca);
        ?>
        
        <h3>Thumbnail de unidad4.jpg</h3>
        <?php
        $imagenOriginal2 = 'unidad4.jpg';
        
        $thumbnail = imagecreatetruecolor(150, 150);
        
        // Cargar la imagen original para el thumbnail
        $imagen2 = imagecreatefromjpeg($imagenOriginal2);
        
        // Redimensionar la imagen original al tamaño del thumbnail
        imagecopyresampled($thumbnail, $imagen2, 0, 0, 0, 0, 150, 150, imagesx($imagen2), imagesy($imagen2));
        
        // Mostrar el thumbnail
        header('Content-Type: image/jpeg');
        imagejpeg($thumbnail);
        
        // Guardar el thumbnail en un archivo
        imagejpeg($thumbnail, 'thumbnail.jpg');
        
        // Liberar la memoria
        imagedestroy($imagen2);
        imagedestroy($thumbnail);
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
