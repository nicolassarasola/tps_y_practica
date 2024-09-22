<?php
//TA MAL REVIZA EL EJEMPLO TODOLIST
//https://gitlab.com/unicen/Web2/livecoding2024/tandil/todo-list/-/blob/main/app/task.php?ref_type=heads
function getConnection(){
    return $db=new PDO('mysql:host=localhost;dbname=tp_tienda_de_electronica;charset=utf8', 'root', '');
}


//agrego nueva consola que el usuario quiere agregar
function addConsolaBd($nombre,$marca){
 $db=getConnection();

    $sentencia = $db->prepare("INSERT INTO `consolas`(`nombre`, `marca`) VALUES (?,?)");//acordate de sanitizar los datos que ingresan del usuario por posible inyeccion SQL

    echo $nombre . " ". $marca;

        $sentencia->execute([$nombre,$marca]);

}

//borrar dato por nombre de consola
            //se llama a la funcion desde el router al buscar /borrar/nombreConsola
function deleteConsolaBd($id){
    $db = getConnection();
    
    $sentencia = $db->prepare("DELETE FROM `consolas` WHERE `ID` = ?");
    $sentencia->execute([$id]);
}
//pido las consolas   
function getConsolas(){
 
    $db = getConnection();
 
    $sentencia= $db->prepare("select * from consolas");
    $sentencia->execute();  

    return $consolas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}



