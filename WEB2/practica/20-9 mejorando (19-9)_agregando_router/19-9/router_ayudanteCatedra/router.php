<?php
//ACORDATE QUE EL .HTACCESS TIENE QUE TENER EL NOMBRE DE TU ROUTER BIEN
require_once 'home.php';


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
        showHome();
        break;
    case 'hom':
       shownav($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
}
