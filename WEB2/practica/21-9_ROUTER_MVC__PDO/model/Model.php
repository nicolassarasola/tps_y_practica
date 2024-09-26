<?php
//TA MAL REVIZA EL EJEMPLO TODOLIST
//https://gitlab.com/unicen/Web2/livecoding2024/tandil/todo-list/-/blob/main/app/task.php?ref_type=heads
class Model { 

    private $db;
    public function __construct(){
       $this->db = new PDO('mysql:host=localhost;dbname=tp_tienda_de_electronica;charset=utf8', 'root', '');
    }

    //agrego nueva consola que el usuario quiere agregar
    public function addConsolaBd($nombre,$marca){
    

        $sentencia = $this->db->prepare("INSERT INTO `consolas`(`nombre`, `marca`) VALUES (?,?)");//acordate de sanitizar los datos que ingresan del usuario por posible inyeccion SQL

        echo $nombre . " ". $marca;

            $sentencia->execute([$nombre,$marca]);

    }

    //borrar dato por nombre de consola
                //se llama a la funcion desde el router al buscar /borrar/nombreConsola
    public function deleteConsolaBd($id){
        $sentencia = $this->db->prepare("DELETE FROM `consolas` WHERE `ID` = ?");
        $sentencia->execute([$id]);
    }
/////////////////////////////////
    public function getConsola($id){//EN IMPLEMENTACION
    
        $sentencia= $this->db->prepare("SELECT * FROM `consolas` WHERE ID = $id");
        $sentencia->execute();  

        return $consolas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    /////////////////////////////////////
    //pido las consolas   
    public function getConsolas(){
    
        $sentencia= $this->db->prepare("select * from consolas");
        $sentencia->execute();  

        return $consolas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}


