<?php
  session_start();
  if (isset($_SESSION['id'])) {
    header('location: menu.php');
  }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="public/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="contenedor" target="request">
            <img src="public/img/ejemplo.jpg" alt="Imagen de Usuario">
            <input type="text" name="username" placeholder="Nombre de Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <button id="login">Iniciar sesión</button>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#login").click(function(){
            $.ajax({
            url : 'controllers/login.php',
            data : {username: $("input[name='username']").val(),
                    password: $("input[name='password']").val()},
            type : 'POST',
            dataType : 'json',
            success : function(json) {
                if(json.status){
                    window.location.href = json.link;
                }
                alert(json.msg);
            }
        });
        });
    </script>
</html>
