<?php 
include('funciones.php');
include('conexionn.php');
    
$id = $_POST["id"];
$client = new MisCliente($conexion);
$tipoo = $client->obtenerUnCliente($id);



?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/clientes.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
    <title>Clientes</title>
</head>

<body>

    <div class="header"></div>
    <div class="scroll"></div>
    <ul id="navigation">
        <li class="home"><a href="menu.html" title="Principal"></a></li>
        <li class="photos"><a href="http://localhost:8081/adventure-master/listar_cliente.php" title="Mis Clientes"></a></li>
        <li class="about"><a href="http://localhost:8081/adventure-master/reservacion.php" title="Nueva Reservacion"></a></li>
        <li class="search"><a href="http://localhost:8081/adventure-master/listar_reservaciones.php" title="Lista de Reservaciones"></a></li>
        <li class="rssfeed"><a href="mostrar_evento.php" title="Mis Eventos"></a></li>
        <li class="podcasts"><a href="mostrar_cobro.php" title="Mis Metodos de Cobro"></a></li>

    </ul>
 <div class="container" id="advanced-search-form">
        <h1>Editar Cliente</h1>

        <form id="registro-formulario" action="http://localhost:8081/adventure-master/procesar_actualizar_cliente.php" method="post">
            <div class="form-group">
                <label for="CUI">CUI</label>
                <input type="text" class="form-control"  id="cui" name="cui" value="<?php echo $tipoo['cui']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control"  id="nombre" required name="nombre" value="<?php echo $tipoo['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control"  id="apellido" required name="apellido" value="<?php echo $tipoo['apellido']; ?>">
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electronico</label>
                <input type="text" class="form-control"  id="correo_electronico" required name="correo_electronico" value="<?php echo $tipoo['correo_electronico']; ?>">
            </div>            
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control"  id="telefono" required name="telefono" value="<?php echo $tipoo['telefono']; ?>">
               
            </div>
           
        
            <div class="form-group">
                <label>Sexo</label>
                <div class="sexo">
                    <label class="radio-inline">
                        <input type="radio" id="sexo" required name="sexo" value="Femenino"> Femenino
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="sexo"required name="sexo" value="Masculino"> Masculino
                    </label>
                </div>
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn" class="center-button">Actualizar</button>
        </form>
    </div>
    <script>
        // Agregar un evento de clic al botón con la clase "Button-Registro"
        document.querySelector(".Button-Regis").addEventListener("click", function() {
            window.location.href = "listar_cliente.php";
        });
      </script>
      <script src="js/registrar_cliente.js"></script>

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
