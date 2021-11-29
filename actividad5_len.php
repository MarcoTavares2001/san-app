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
        <nav class="menu lenguaje">
            <div>
                <a href="lenguaje.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <a id="mute"><i class="fas fa-volume-mute"></i></a>
            <?php if($materia->verificar_act($_SESSION['id'], 'lenguaje', 'act5')){ ?>
            <a id="download"><i class="fas fa-paper-plane"></i></a>
            <?php } ?>
        </nav>
        <div class="contenedor lenguaje">
           <h4>Actividad 5. Aprendo sobre los gatos.</h4>
           <span>Lee la historia de los gatos y colorea la respuesta correcta.
                <i class="fas fa-volume-up instrucciones"></i>
           </span>
           <div class="center-flex">
               <span>
                    <h4>Los gatos</h4>
                    Los gatos son animales que viven en nuestros hogares.
                    Tienen ojos enormes y bigotes largos. Los gatos pueden subirse a los árboles, también pueden ronronear.
                    ¡Me encantan los gatos! Los gatos domésticos son mamíferos pequeños que viven en muchos hogares.
                    Tienen ojos enormes para ver en la noche y bigotes largos para sentir.
                    Los gatos pueden correr, saltar y subirse a los árboles.
                    También pueden maullar y ronronear. Me encantan los gatos. brr, brr.
                    <i class="fas fa-volume-up instrucciones"></i>
                </span>
                <canvas id="pizarra" width="400px" height="400px"></canvas>
                <ul>
                    <a id="refrescar"><i class="fas fa-refresh"></i></a>
                    <li><a style="color:black"><i class="fas fa-paint-brush active"></i></a></li>
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
        fondo.src = 'public/img/gatosActividad.png';
        fondo.crossOrigin = "anonymous";
        fondo.onload = function(){
            context.drawImage(fondo, 0, 0, canvas.width, canvas.height);
        }
        enviar(<?=$_SESSION['id']?>, "lenguaje", "act5", "<?=$_SESSION['nombre']?>");
    </script>
</html>
