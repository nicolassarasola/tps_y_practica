<?php
require_once 'bd.php';
require_once 'view.php';


// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        showConsolas();
        break;
    case 'agregar':
        showForm();
        agregarConsola();
        break;
    case 'delete':
        showForm();
        borrarConsola($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
}