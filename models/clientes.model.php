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

    /*Estas son las columnas de la tabla:
    id
    primer_nombre
    primer_apellido
    email
    id_cliente
    llave_secreta */


    $link = Conexion::conectar();
    $query = $link->prepare("INSERT INTO clientes (primer_nombre, primer_apellido, email, id_cliente,llave_secreta ) VALUES (:primer_nombre, :primer_apellido, :email, :id_cliente,:llave_secreta)");
    $query->bindParam(":primer_nombre", $datos["primer_nombre"]);
    $query->bindParam(":primer_apellido", $datos["primer_apellido"]);
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
