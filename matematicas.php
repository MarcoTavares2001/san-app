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
        <link rel="stylesheet" href="public/css/actividades.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    </head>
    <body>
        <div class="contenedor matematicas">
            <div class="cards">
                <?php
                    foreach ($materia->read_materia($_SESSION['id'], "matematicas") as $row) {
                ?>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act1'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act2'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act3'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act4'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act5'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <button class="card">
                    <span></span>
                    <i class="fas fa-<?=($row['act6'] == 0 ? 'thumbtack' : 'check')?>"></i>
                    <i class="fas fa-palette"></i>
                </button>
                <?php } ?>
            </div>
        </div>
    </body>
    <script src="public/js/cards.js" name="mate"></script>
</html>