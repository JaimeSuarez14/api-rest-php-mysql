<?php 
class ClientesControllers {
  public function create(){
    $json = array("detalle" => "Estas en el api de clientes");
    echo json_encode($json, true);
  }
}

?>

