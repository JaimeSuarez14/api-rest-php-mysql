<?php 
require_once "controllers/rutas.controllers.php";
require_once "controllers/cursos.controllers.php";
require_once "controllers/clientes.controllers.php";
require_once "models/cursos.model.php";
require_once "models/clientes.model.php";
$rutas = new RutasControllers();
$rutas->inicio();