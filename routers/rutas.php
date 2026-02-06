<?php

$arrayRutas = explode("/", $_SERVER["REQUEST_URI"]);



if (count(array_filter($arrayRutas)) == 0) {
  $json = array("detalle" => "No encontrado");
  echo json_encode($json, true);
} else if (count(array_filter($arrayRutas)) > 0) {
  if ($arrayRutas[1] == "cursos") {

    switch ($_SERVER['REQUEST_METHOD']) {
      case 'GET':
        //ruta /cursos/123
        if( $arrayRutas[2] && is_numeric(array_filter($arrayRutas)[2])) {
          $cursos = new CursosControllers();
          $cursos->showCurso(array_filter($arrayRutas)[2]);
        }else {
          $cursos = new CursosControllers();
          $cursos->index();
        }
        break;
      case 'POST':
        $the_request = &$_POST;
        $cursos = new CursosControllers();
        $cursos->create();
        break;
      case 'PUT':
        //ruta /cursos/123
        if( $arrayRutas[2] && is_numeric(array_filter($arrayRutas)[2])) {
          $cursoUpdate = new CursosControllers();
          $cursoUpdate->update(array_filter($arrayRutas)[2]);
        }else {
          echo "Id no valido";
        }
        break;

      case 'DELETE':
        //ruta /cursos/123
        if( $arrayRutas[2] && is_numeric(array_filter($arrayRutas)[2])) {
          $cursoDelete = new CursosControllers();
          $cursoDelete->delete(array_filter($arrayRutas)[2]);
        }else {
          echo "Id no valido";
        }
        break;
      default:
      echo "Metodo no permitido";
    }

  }
  if ($arrayRutas[1] == "registro") {
     switch ($_SERVER['REQUEST_METHOD']) {
      case 'GET':
        $the_request = &$_GET;
        break;
      case 'POST':
        $the_request = &$_POST;
        $clientes = new ClientesControllers();
        $clientes->create();
        break;

      default:
      echo "Metodo no permitido";
    }
  }
}
