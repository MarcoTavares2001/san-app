<?php
  if(empty($_POST['nombre']) || empty($_POST['apellidop']) || empty($_POST['apellidom']) || empty($_POST['edad']) || empty($_POST['sexo']) || empty($_POST['telefono']) || empty($_POST['celular']) || empty($_POST['curp'])){
      echo json_encode(array('status' => 'false', 'msg' => 'Error: Rellene los campos.'));
  }else{
    include("../controllers/crudAlumnos.php");
    $alumno = new CrudAlumnos();
    $res = $alumno->create(
      $_POST['nombre'],
      $_POST['apellidop'],
      $_POST['apellidom'],
      $_POST['edad'],
      (($_POST['sexo'] == 1)?("Masculino"):("Femenino")),
      $_POST['telefono'],
      $_POST['celular'],
      $_POST['curp']
    );
    if($res){
      $array = $alumno->queryToJava($alumno->search($_POST['curp']));
      echo json_encode(array('status' => 'true', 'msg' => $array));
    }else{
      echo json_encode(array('status' => 'false', 'msg' => "Error: Alumno con esa CURP ya existe"));
    }
  }
  return;
?>
