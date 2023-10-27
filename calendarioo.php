<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="css/calendario.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
       
    </style>
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
            <li class="rssfeed"><a href="tipo_evento.html" title="Mis Eventos"></a></li>
            <li class="podcasts"><a href="tipo_pago.html" title="Mis Metodos de Cobro"></a></li>

        </ul>

        <!-- Esta parte es para colocar dos apartados qye muestren una lista de los meses y años en el calendario-->
    <?php
    // Nombres de los meses en español
    $meses = array(
        1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril",
        5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
        9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
    );

    // Obtener el mes y el año actual
    $mes = isset($_GET['mes']) ? $_GET['mes'] : date("n");
    $anio = isset($_GET['anio']) ? $_GET['anio'] : date("Y");

    // Obtener el nombre del mes en español
    $nombreMes = $meses[$mes];
    ?>
    </form>

    <h2 class="header-text">Calendario de <?php echo $nombreMes; ?> <?php echo $anio; ?></h2>
    

    <!-- Botón para ir al mes anterior -->
    <button class="arrow-button custom-button" onclick="window.location.href='?mes=<?php echo ($mes == 1) ? 12 : ($mes - 1); ?>&anio=<?php echo ($mes == 1) ? ($anio - 1) : $anio; ?>'">&lt;</button>
    
    <!-- Botón para ir al mes siguiente -->
    <button class="arrow-button custom-button" onclick="window.location.href='?mes=<?php echo ($mes == 12) ? 1 : ($mes + 1); ?>&anio=<?php echo ($mes == 12) ? ($anio + 1) : $anio; ?>'">&gt;</button>

        <!-- Formulario para seleccionar el mes y el año -->
        <form class="select-form" method="GET">
        <label for="mes">Mes:</label>
        <select id="mes" name="mes">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='$i' " . ($mes == $i ? 'selected' : '') . ">" . $meses[$i] . "</option>";
            }
            ?>
        </select>
        <label for="anio">Año:</label>
        <select id="anio" name="anio">
            <?php
            $anioActual = date("Y");
            for ($i = $anioActual - 10; $i <= $anioActual + 10; $i++) {
                echo "<option value='$i' " . ($anio == $i ? 'selected' : '') . ">$i</option>";
            }
            ?>
        </select>
        <button type="submit" class="button">Seleccionar</button>
        </form>

    <table>
        

    
        <tr>
            <!-- Encabezados de los días de la semana -->
            <?php
            $diasSemana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
            foreach ($diasSemana as $dia) {
                echo "<th>$dia</th>";
            }
            ?>
        </tr>
        <tr>
            <?php
            // Obtener el primer día del mes y el número de días en el mes
            $primerDia = mktime(0, 0, 0, $mes, 1, $anio);
            $numDias = date("t", $primerDia);

            // Obtener el nombre del primer día de la semana (lunes, martes, etc.)
            $nombrePrimerDia = date("l", $primerDia);

            // Obtener el índice del primer día de la semana en el array $diasSemana
            $indicePrimerDia = array_search($nombrePrimerDia, $diasSemana);

            // Rellenar los días del mes en la tabla
            $contador = 1;
            $diaActual = 1;


   for ($diaActual = 1; $diaActual <= $numDias; $diaActual++) {
    // Obtén la fecha en formato YYYY-MM-DD
    $fecha = sprintf("%04d-%02d-%02d", $anio, $mes, $diaActual);

    // Agrega una clase específica para los nombres de los meses y años
    $clase = ($diaActual <= 7) ? 'mes-ano' : ''; // Asigna la clase solo a las primeras 7 celdas

    // Imprime la celda del calendario con el enlace que abre la ventana modal y la clase específica
    echo '<td class="date-cell ' . $clase . '"><a href="javascript:void(0);" onclick="openModal(\'reservacion.php?fecha=' . $fecha . '\')">' . $diaActual . '</a></td>';

    // Si es el último día de la semana, cierra la fila y comienza una nueva fila
    if (($diaActual + $indicePrimerDia) % 7 == 0) {
        echo '</tr><tr>';
    }
}

            ?>
        </tr>
        
    </table>

    

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


    <script>
    function openModal(url, modalId) {
    // Crea un div para la ventana modal
    var modalDiv = document.createElement('div');
    modalDiv.className = 'modal';
    modalDiv.id = modalId;  // Asigna un ID único a la ventana modal

    // Crea un botón de cierre para cerrar la ventana modal
    var closeButton = document.createElement('button');
    closeButton.className = 'close-button';
    closeButton.innerHTML = 'X';
    closeButton.onclick = function() {
        document.body.removeChild(modalDiv);
    };
    modalDiv.appendChild(closeButton);

    // Crea un iframe para cargar la página reservacion.php
    var iframe = document.createElement('iframe');
    iframe.src = url;
    modalDiv.appendChild(iframe);

    // Agrega el div modal al cuerpo del documento
    document.body.appendChild(modalDiv);
}
function closeModal() {
    // Cierra la ventana modal llamando a la función closeWindowModal() en calendario.php
    window.opener.closeWindowModal();
    // Cierra esta ventana
    window.close();}
</script>

    <script src="js/calendario.js"></script>
    
</body>
</html>
