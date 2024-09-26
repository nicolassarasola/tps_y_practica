<?php
require_once './controller/Controller.php';
// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller= new Controller();//se crea un nuevo controllador por mensaje por posible seguridad aplicada en el controllador
        $controller->showHome();
        break;
    case 'add':
        $controller= new Controller();
        $controller->addConsola();
        break;
    case 'delete':
        $controller= new Controller();
        $controller->deleteConsola(/*$params[1]*/);
        break;
        /////////////////////////////////////////
    case 'get'://///////////EN IMPLEMENTACION
        $controller= new Controller();
        $controller->getConsola();
    /////////////////////////////////////////
    default:
        echo('404 Page not found');//va para la view
        break;
}