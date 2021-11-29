<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header('location: index.php');
  }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
        <title>Menu Principal</title>
        <link rel="shortcut icon" href="favicon.png">
        <link rel="stylesheet" href="public/css/menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    </head>
    <body>
        <div id="contenedor">
            <div id="materias">
                <div id="cabezaMaterias">
                    <a><i class="fas fa-stream"></i></a>
                </div>
                <div id="cuerpoMaterias">
                    <a value="actLenguaje"><img src="public/img/lenguaje.jpg" alt="Logo Lenguaje"></a>
                    <a value="actMatematicas"><img src="public/img/matematicas.jpg" alt="Logo Matematicas"></a>
                    <a value="actExploracion"><img src="public/img/exploracion.jpg" alt="Logo Exploracion"></a>
                </div>
            </div>
            <div id="flexAjuste">
                <nav id="navegacion">
                    <ul>
                        <li id="nombreFrame">
                            Menu
                        </li>
                        <li>
                            <img id="imgUsuario" src="data:image/jpeg;base64,<?=base64_encode($_SESSION['foto'])?>" alt="Imagen de usuario">
                            <span id="nombre">Hola <?=$_SESSION['nombre']?>!</span>
                            <a><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </nav>
                <div id="actividades">
                    <iframe id="actMatematicas" src="matematicas.php" frameborder="0"></iframe>
                    <iframe id="actLenguaje" src="lenguaje.php" frameborder="0"></iframe>
                    <iframe id="actExploracion" src="exploracion.php" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </body>
    <script src="public/js/sonidos.js"></script>
    <script type="text/javascript">
      const click = cargarSonido("public/sound/click.mp3");
    </script>
    <script src="public/js/menu.js"></script>
</html>
