<?php
require 'conexionn.php';
require 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cui"])) {
    $id = $_POST["cui"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    
    $client = new MisCliente($conexion);

    if ($client->actualizarCliente($id, $nombre, $apellido, $correo, $telefono, $sexo)) {
        // La actualización se realizó correctamente, redirecciona a la lista de usuarios
        header("Location: listar_cliente.php");
        exit();
    } else {
        // Hubo un error al actualizar el usuario, muestra un mensaje de error
        echo "Error al actualizar el cliente.";
    }
} else {
    // Si no se proporciona un ID válido en el formulario, redirige de nuevo a la lista de usuarios.
    header("Location: listar_cliente.php");
    exit();
}
?>