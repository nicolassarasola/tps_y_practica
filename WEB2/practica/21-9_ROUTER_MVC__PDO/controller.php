<?php
require_once 'bd.php';
require_once 'view.php';


function showHome(){
    $consolas=getConsolas();
    showHomeView($consolas);
}

function addConsola(){
    showForm();
     if (!isset($_POST['nombre']) || empty($_POST['nombre'])||(!isset($_POST['marca']) || empty($_POST['marca']))) {
        showErrorForm();
    }
    else{

        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
    
         addConsolaBd($nombre,$marca);
         
    }
    showHome();
}
function deleteConsola(){
    showDeleteForm();
   
    if (!isset($_POST['ID']) || empty($_POST['ID'])){
        echo showErrorForm();
    }
    else{ 
        $id=$_POST['ID'];
        showDeleteConsola($id);
        deleteConsolaBd($id);
    }
    showHome();
}

function getForm(){  
   
    
    return $consolaNueva = $_POST['nombre']; 
}

