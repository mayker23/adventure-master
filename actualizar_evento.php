<?php 
include('funciones.php');
include('conexionn.php');
    
$id = $_POST["id"];
$even = new MisEventos($conexion);
$tipoo = $even->obtenerUnEvento($id);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Evento</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
  
    <link rel="stylesheet" href="css/tipo_evento.css">
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
    <div><img src="img/6197706_orig.jpg" alt="image" class="img-grande">
        <div class="container">
            <h1 class="letrass">Editar Evento</h1>
            <form id="eventoForm" action="http://localhost:8081/adventure-master/procesar_actualizar_evento.php" method="post">
                
                <div class="form-group">
                    <label for="tipo">Codigo:</label>
                    <input type="text" id="id" name="id" value="<?php echo $tipoo['id']; ?>" readonly>

                </div>

                <div class="form-group">
                    <label for="tipo">Nombre del Evento:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $tipoo['nombre_evento']; ?>" required title="Rellene este campo">

                </div>
                <div class="form-group">
                    <label for="costo">Costo del Evento:</label>
                    <input type="number" id="costo" name="costo" value="<?php echo $tipoo['costo_evento']; ?>"required title="Rellene este campo">
                </div>

                <div class="form-group">
                    <label for="costo">Estado:</label>
                    <select id="estado" name="estado" required="">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>

                    </select>
                </div>

                <button type="submit" class="center-button">Actualizar</button>
            </form>
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
