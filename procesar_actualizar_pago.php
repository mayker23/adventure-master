<?php
require 'conexionn.php';
require 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];
    
    $cobro = new cobro($conexion);

    if ($cobro->actualizarCobro($id, $nombre, $estado)) {
        // La actualización se realizó correctamente, redirecciona a la lista de usuarios
        header("Location: mostrar_cobro.php");
        exit();
    } else {
        // Hubo un error al actualizar el usuario, muestra un mensaje de error
        echo "Error al actualizar el cobro.";
    }
} else {
    // Si no se proporciona un ID válido en el formulario, redirige de nuevo a la lista de usuarios.
    header("Location: mostrar_cobro.php");
    exit();
}
?>
