<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $año = $_POST['año'];

    if (checkdate($mes, $dia, $año)) {
        $fechaIngresada = new DateTime("$año-$mes-$dia");
        $fechaActual = new DateTime("now");
        
        // Calcular la diferencia entre las fechas
        $interval = $fechaIngresada->diff($fechaActual);
        $diasRestantes = $interval->days;
        
        if ($fechaIngresada < $fechaActual) {
            $mensaje = "Han pasado $diasRestantes días desde la fecha $dia/$mes/$año.";
        } else {
            $mensaje = "Faltan $diasRestantes días para la fecha $dia/$mes/$año.";
        }

        // Redirigir a unidad2.php con los datos
        header('Location: unidad2.php?resultado=' . $diasRestantes . '&fecha=' . $mensaje);
        exit();
    } else {
        header('Location: unidad2.php?resultado=Fecha%20no%20válida');
        exit();
    }
}
?>

