<?php 
require_once "controllers/rutas.controllers.php";
require_once "controllers/cursos.controllers.php";
require_once "controllers/clientes.controllers.php";
$rutas = new RutasControllers();
$rutas->inicio();