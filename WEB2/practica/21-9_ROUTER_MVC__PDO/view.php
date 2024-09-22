<?php
require_once 'bd.php';

function showForm(){
    require_once './template/form.phtml';
}

function showConsolas($consolas){
    //esto puede ser un template
    'ul';
    foreach($consolas as $consola) {
        echo '<li>'.$consola->nombre.'</li>';
    }
    '/ul';

}

function showHomeView($consolas){
    showConsolas($consolas);
    require_once'./template/inputs.phtml';
}
function showErrorForm(){
    echo '<h4>reingrese los datos correctamente</h4>';
}
function showDeleteForm(){
    require_once'./template/formDelete.phtml';
}
function showDeleteConsola($id){
    echo "<h4>ID a eliminar: " . $id."</h4>";
}