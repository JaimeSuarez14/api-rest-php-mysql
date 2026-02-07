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

  static public function create($datos) {
    try {
        $link = Conexion::conectar();
        $query = $link->prepare("INSERT INTO clientes (primer_nombre, primer_apellido, email, id_cliente, llave_secreta) VALUES (:primer_nombre, :primer_apellido, :email, :id_cliente, :llave_secreta)");
        
        $query->bindParam(":primer_nombre", $datos["nombre"]);
        $query->bindParam(":primer_apellido", $datos["apellido"]);
        $query->bindParam(":email", $datos["email"]);
        $query->bindParam(":id_cliente", $datos["id_cliente"]);
        $query->bindParam(":llave_secreta", $datos["llave_secreta"]);

        $inserted = $query->execute(); //esta linea sirve para ejecutar la consulta
        $count = $query->rowCount(); //esta otra linea sirve para contar las filas afectadas por la consulta
        $query->closeCursor(); //aca se cierra 
        return $inserted && $count > 0;  //devuelve el booleano

    } catch (PDOException $e) {
        // Manejo de error
        error_log("Error en la inserción: " . $e->getMessage());
        return false;
    } finally {
        $link = null; // Cierra la conexión
    }
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
