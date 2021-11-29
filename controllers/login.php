<?php
require_once 'conexion.php';
$db = new Conexion();

session_start();

if(empty($_POST['username']) || empty($_POST['password'])){
  echo json_encode(array('status' => 'false', 'msg' => 'Error: Rellene los campos.'));
  return;
}

$username = $_POST['username'];
$password = $_POST['password'];
$q = ("SELECT id, nombre, email, contrasena, foto FROM usuarios WHERE email = '$username' AND contrasena = '$password'");
$r = mysqli_query($db->con, $q);
if($r->num_rows > 0){
    $v = $r->fetch_assoc();
    $_SESSION['id'] = $v['id'];
    $_SESSION['nombre'] = $v['nombre'];
    $_SESSION['foto'] = $v['foto'];
    echo json_encode(array('status' => true, 'msg' => 'Hola '.$v['nombre'].', ¡Bienvenida!', 'link' => 'menu.php'));
    return;
}else{
    echo json_encode(array("status" => false, "msg" => "Error: No existe un usuario con ese nombre o contraseña"));
    return;
}
?>
