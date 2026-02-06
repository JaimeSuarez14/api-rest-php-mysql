<?php

require_once "conection.php";

class ClienteModel
{

  static public function getAll()
  {
    $link = Conexion::conectar();
    $query = $link->prepare("SELECT * FROM clientes");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    $query->close();
    $link = null;
  }

  static public function create($datos)
  {
    $link = Conexion::conectar();
    $query = $link->prepare("INSERT INTO clientes (nombre, apellido, email, telefono) VALUES (:nombre, :apellido, :email, :telefono)");
    $query->bindParam(":nombre", $datos["nombre"]);
    $query->bindParam(":apellido", $datos["apellido"]);
    $query->bindParam(":email", $datos["email"]);
    $query->bindParam(":telefono", $datos["telefono"]);
    if ($query->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $query->close();
    $link = null;
  }

  static public function validarEmailRepetido($email)
  {
    $link = Conexion::conectar();
    $query = $link->prepare("SELECT COUNT(*) FROM clientes WHERE email = :email");
    $query->bindParam(":email", $email);
    $query->execute();

    $count = $query->fetchColumn();
    $query->closeCursor();
    $link = null;

    // Retorna true si el correo existe, false si no
    return $count > 0;
  }
}
