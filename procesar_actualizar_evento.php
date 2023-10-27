<?php
require 'conexionn.php';
require 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $costo = $_POST["costo"];
    $estado = $_POST["estado"];
    
    $event = new MisEventos($conexion);

    if ($event->actualizarEvento($id, $nombre, $costo, $estado)) {
        // La actualización se realizó correctamente, redirecciona a la lista de usuarios
        header("Location: mostrar_evento.php");
        exit();
    } else {
        // Hubo un error al actualizar el usuario, muestra un mensaje de error
        echo "Error al actualizar el evento.";
    }
} else {
    // Si no se proporciona un ID válido en el formulario, redirige de nuevo a la lista de usuarios.
    header("Location: mostrar_evento.php");
    exit();
}
?>