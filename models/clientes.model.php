<?php

require_once "conection.php";

class ClienteModel {

  static public function getAll(){
    $link = Conexion::conectar();
    $query = $link->prepare("SELECT * FROM clientes");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    $query->close();
    $link = null;
  }

  static public function create($datos){
    $link = Conexion::conectar();
    $query = $link->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");
    $query->bindParam(":nombre", $datos["nombre"]);
    $query->bindParam(":email", $datos["email"]);
    $query->bindParam(":telefono", $datos["telefono"]);
    if($query->execute()){
      return "ok";
    }else{
      return "error";
    }
    $query->close();
    $link = null;
  }
}