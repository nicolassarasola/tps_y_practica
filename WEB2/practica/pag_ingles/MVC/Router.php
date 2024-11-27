<?php

    require_once './app/controllers/WordController.php';
    require_once './libs/Response.php';
    require_once './middleware/SessionAuthMidleware.php';
    require_once './middleware/VerifyAuthMidleware.php';


    $action = 'home';

    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');



    if (isset($_GET['action']) && !empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home';
    }



    $res = new Response();

    $params = explode('/', $action);



    switch ($params[0]) {

        case 'home':
            $controller =new WordController();
            $controller->showHome();
            break;
        case 'palabras':
            $controller= new WordController();
            $controller->showAllWords();
            break;
        case 'palabra':
            $controller= new WordController();
            $controller->showAllWords($params[1]);
            break;
        
        case 'agregarPalabra':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller=new WordController();
            $controller->addWord();
            break;

        case 'modificarPalabra':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller=new WordController();
            $controller->updateWord();
            break;
        
        case 'borrarPalabra':
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller=new WordController();
            $controller->deleteWord();


    }