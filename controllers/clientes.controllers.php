<?php 
class ClientesControllers {
  public function create($datos){
    //$json = ClienteModel::create($datos);
    echo json_encode($datos, true);
  }
}

?>

