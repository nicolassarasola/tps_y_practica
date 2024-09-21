<?php
require_once 'bd.php';

function showForm(){
    require_once './template/form.phtml';
}
function showConsolas(){
 
 $consolas=getConsolas();
    'ul';
    foreach($consolas as $consola) {
        echo '<li>'.$consola->nombre.'</li>';
    }
    '/ul';
}