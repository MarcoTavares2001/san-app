<?php
  include("../controllers/crudAlumnos.php");
  $alumno = new CrudAlumnos();
  $res = $alumno->delete($_POST['id']);
  if($res){
    echo json_encode(array("status"=>"true", "msg"=>"Se ha eliminado correctamente el Alumno"));
  }else{
    echo json_encode(array("status"=>"false", "msg"=>"No se ha podido eliminar el Alumno"));
  }
  return;
?>
