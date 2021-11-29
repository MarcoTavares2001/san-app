<?php
    session_start();
    include("controllers/Materias.php");
    $materia = new Materias();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <link rel="stylesheet" href="public/css/trabajoFinalizado.css">
        <link rel="stylesheet" href="public/css/menu_actividades.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="menu exploracion">
            <div>
                <a href="exploracion.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <a id="mute"><i class="fas fa-volume-mute"></i></a>
            <?php if($materia->verificar_act($_SESSION['id'], 'exploracion', 'act2')){ ?>
            <a id="download"><i class="fas fa-paper-plane"></i></a>
            <?php } ?>
        </nav>
        <div class="contenedor exploracion">
           <h4>Actividad 2. El clima el día de hoy.</h4>
           <span>Observe y encierre la opcion que corresponde al dia de hoy.
                <i class="fas fa-volume-up instrucciones"></i>
           </span>
           <div class="center-flex">
                <canvas id="pizarra" width="400px" height="400px"></canvas>
                <ul>
                    <a id="refrescar"><i class="fas fa-refresh"></i></a>
                    <li><a style="color:black"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:orange"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:yellow"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:red"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:blue"><i class="fas fa-paint-brush"></i></a></li>
                    <li><a style="color:green"><i class="fas fa-paint-brush"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="enviarFelicitaciones">
          <div class="text">
            <p class="title">Felicidades!, Tarea Completada Eres</p>
            <p class="change">
              <span class="word wisteria">Genial.</span>
              <span class="word belize">Grandioso.</span>
              <span class="word pomegranate">Inteligente.</span>
              <span class="word green">Impresionante.</span>
              <span class="word midnight">Unico.</span>
            </p>
          </div><img>
        </div>
    </body>
    <script src="public/js/dibujar.js"></script>
    <script src="public/js/asistente.js"></script>
    <script src="public/js/sonidos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="public/js/trabajoFinalizado.js"></script>
    <script>
        fondo.src = 'public/img/nubes.png';
        fondo.crossOrigin = "anonymous";
        fondo.onload = function(){
            context.drawImage(fondo, 0, 0, canvas.width, canvas.height);
        }
        enviar(<?=$_SESSION['id']?>, "exploracion", "act2", "<?=$_SESSION['nombre']?>");
    </script>
</html>
