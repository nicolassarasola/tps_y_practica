<?php
//TA MAL REVIZA EL EJEMPLO TODOLIST
//https://gitlab.com/unicen/Web2/livecoding2024/tandil/todo-list/-/blob/main/app/task.php?ref_type=heads
function getConnection(){
    return $db=new PDO('mysql:host=localhost;dbname=tp_tienda_de_electronica;charset=utf8', 'root', '');
}


//form que agarra lo que mando el usuario
            function recibirForm(){  
            if(!empty($_POST['consola'])) { 
                $consolaNueva = $_POST['consola']; 
            }
}
//agrego nueva consola que el usuario quiere agregar
function agregarConsola(){
 $db=getConnection();
 $consolaNueva=recibirForm();
    $sentencia = $db->prepare("INSERT INTO consolas(nombre) VALUES(?)");//acordate de sanitizar los datos que ingresan del usuario por posible inyeccion SQL

        $sentencia->execute(array($consolaNueva));
}

//borrar dato por nombre de consola
            //se llama a la funcion desde el router al buscar /borrar/nombreConsola
function borrarConsola($consolaNueva){
    $db = getConnection();
    $consolaNueva=recibirForm();

    $sentencia = $db->prepare( "delete from consolas where nombre=?");
        
        $sentencia->execute([$consolaNueva]);
}
//pido las consolas   
function getConsolas(){
 
    $db = getConnection();
 
    $sentencia= $db->prepare("select * from consolas");
    $sentencia->execute();  

    return $consolas = $sentencia->fetchAll(PDO::FETCH_OBJ);
}



