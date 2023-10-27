<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('funciones.php');
include('conexionn.php');

$cobros = new listar_cobros($conexion);
$funciones = $cobros->listarMisCobros();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cobros</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="jquery-1.3.2.js"></script>

    <link rel="stylesheet" type="text/css" href="css/mostrar_cobros.css">
</head>
<body>
<div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
        <li class="home"><a href="menu.html" title="Principal"></a></li>
            <li class="photos"><a href="http://localhost:8081/adventure-master/listar_cliente.php" title="Mis Clientes"></a></li>
            <li class="about"><a href="http://localhost:8081/adventure-master/reservacion.php" title="Nueva Reservacion"></a></li>
            <li class="calendario"><a href="calendarioo.php" title="Calendario"></a></li>
            <li class="search"><a href="listar_reservaciones.php" title="Lista de Reservaciones"></a></li>
            <li class="rssfeed"><a href="mostrar_evento.php" title="Mis Eventos"></a></li>
           <li class="podcasts"><a href="mostrar_cobro.php" title="Mis Metodos de Cobro"></a></li>

        </ul>

    
<div class="container">
<h1>Lista de Mis Tipos de Cobro</h1>
    <button type="button"class="add-button" onclick="window.location.href='tipo_pago.html'">Agregar Cobro</button>
    <table class="user-table">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($funciones as $cobros) { ?>
            <tr>
                <td><?php echo $cobros['id']; ?></td>
                <td><?php echo $cobros['nombre_cobro']; ?></td>
                <td><?php echo ($cobros['estado'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
       
                <td>
                <form method="post" action="actualizar_pago.php">
                <input type="hidden" name="id" value="<?php echo $cobros['id']; ?>">
                <button type="submit" class="button">Editar</button>
                </form>
                </td>

            </tr>
        <?php } ?>
    </table>

     </div>
    
     <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-85px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-85px'},200);
                    }
                );
            });
        </script>


</body>
</html>