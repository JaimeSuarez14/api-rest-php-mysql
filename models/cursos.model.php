<?php

require_once "conection.php";

class CursosModel {

  static public function getAll(){
    $link = Conexion::conectar();
    $query = $link->prepare("SELECT * FROM cursos");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    $query->close();
    $link = null;
  }
}