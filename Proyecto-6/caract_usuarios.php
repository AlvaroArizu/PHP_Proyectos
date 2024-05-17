<?php
include 'usuarios.php';

// Crear instancia de Usuarios
$usuario = new Usuarios('Juan', 'Pérez', '1990-05-15');

// Llamar al método imprime_caracteristicas
$usuario->imprime_caracteristicas();
?>
