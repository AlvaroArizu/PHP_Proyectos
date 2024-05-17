<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_apellido = $_POST['nombre_apellido'];
    $mail = $_POST['mail'];
    $comentario = $_POST['comentario'];

    // Obtener la fecha y hora actual
    $fecha_hora = date('Y-m-d H:i:s');

    // Crear el formato para el comentario
    $nuevo_comentario = "Nombre y Apellido: $nombre_apellido\nMail: $mail\nComentario: $comentario\nFecha y Hora: $fecha_hora\n\n";

    // Abrir el archivo en modo escritura y agregar el nuevo comentario
    file_put_contents('comentarios.txt', $nuevo_comentario, FILE_APPEND);

    // Redirigir de nuevo a unidad3.php
    header("Location: unidad3.php");
}
?>
