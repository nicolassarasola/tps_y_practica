<?php
require_once 'controller.php';


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
        showHome();
        break;
    case 'add':
        addConsola();
        break;
    case 'delete':
        deleteConsola(/*$params[1]*/);
        break;
    default:
        echo('404 Page not found');
        break;
}