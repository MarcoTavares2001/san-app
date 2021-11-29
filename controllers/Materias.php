<?php
  include("conexion.php");

  class Materias{
    function __construct(){
      $this->db = new Conexion();
      $this->con = $this->db->con;
    }

    function read_materia($id, $materia){
      $sql = "SELECT * FROM $materia WHERE id_usuario = '$id'";
      $res = mysqli_query($this->con, $sql);
      return $res;
    }

    function verificar_act($id, $materia, $act){
      $sql = "SELECT * FROM $materia WHERE id_usuario = '$id' AND $act = 0";
      $res = mysqli_query($this->con, $sql);
      return $res->num_rows;
    }

    function actualizarActividad($id, $materia, $act){
      $sql = "UPDATE $materia SET $act = 1 WHERE id_usuario = '$id'";
      $res = mysqli_query($this->con, $sql);
      return $res;
    }
  }
?>
