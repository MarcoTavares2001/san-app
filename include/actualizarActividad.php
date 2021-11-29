<?php
  include("../controllers/Materias.php");
  $materia = new Materias();
  $res = $materia->actualizarActividad($_POST['id'], $_POST['materia'], $_POST['act']);
  echo $res;
  return;
?>
