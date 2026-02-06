<?php 
class ClientesControllers {
  public function create($datos){

    if(trim($datos["nombre"]) == "" || trim($datos["email"]) == "" || trim($datos["telefono"]) == ""){
      $json = array("detalle" => "Faltan datos");
      echo json_encode($json, true);
      return;
    }

    if(!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)){
      $json = array("detalle" => "Email no valido");
      echo json_encode($json, true);
      return;
    }

    if(ClienteModel::validarEmailRepetido($datos["email"])){
      $json = array("detalle" => "Email repetido, por favor ingrese otro");
      echo json_encode($json, true);
      return;
    }

    if(!preg_match("/^[0-9]+$/", $datos["telefono"]) || strlen($datos["telefono"]) != 9){
      $json = array("detalle" => "Telefono no valido");
      echo json_encode($json, true);
      return;
    }

    if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $datos["nombre"])){
      $json = array("detalle" => "Nombre no valido");
      echo json_encode($json, true);
      return;
    }

    if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $datos["apellido"])){
      $json = array("detalle" => "Apellido no valido");
      echo json_encode($json, true);
      return;
    }


    //$json = ClienteModel::create($datos);
    echo json_encode($datos, true);
  }
}

?>

