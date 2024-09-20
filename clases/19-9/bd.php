<?php
require 'view.phtml';


$db=new PDO('mysql:host=localhost;dbname=tp_tienda_de_electronica;charset=utf8', 'root', '');



//form que agarra lo que mando el usuario
            //acordate de sanitizar los datos que ingresan del usuario por posible inyeccion SQL
            if(!empty($_POST['consola'])) { 
                $consolaNueva = $_POST['consola']; 
            }
//agrego nueva consola que el usuario quiere agregar
$sentencia = $db->prepare("INSERT INTO consolas(nombre) VALUES(?)");
    $sentencia->execute(array($consolaNueva));


//borrar dato por nombre de consola
            //se llama a la funcion desde el router al buscar /borrar/nombreConsola
function borrarConsola($db, $consolaNueva){
    $sentencia = $db->prepare( "delete from consolas where nombre=?");
        
        $sentencia->execute([$consolaNueva]);
}
//pido las consolas   
$sentencia= $db->prepare("select * from consolas");
$sentencia->execute();  

$consolas = $sentencia->fetchAll(PDO::FETCH_OBJ);





//muestro consolas
    'ul';
    foreach($consolas as $consola) {
        echo '<li>'.$consola->nombre.'</li>';
    }
    '/ul';




