<?php 
class CursosControllers {
  public function index(){
    $json = CursosModel::getAll();
    //echo json_encode($json, true);
    return $json;
  }

  public function create() {
    $json = array("detalle" => "Estas en el api de cursos para crear");
    echo json_encode($json, true);
  }

  public function showCurso($id){
    $json = array("detalle" => "Estas en el api de cursos para mostrar el curso con id: $id");
    echo json_encode($json, true);
  }

  public function update($id){
    $json = array("detalle" => "Estas en el api de cursos para actualizar el curso con id: $id");
    echo json_encode($json, true);
  }

  public function delete($id){
    $json = array("detalle" => "Estas en el api de cursos para eliminar el curso con id: $id");
    echo json_encode($json, true);
  }
}

?>

