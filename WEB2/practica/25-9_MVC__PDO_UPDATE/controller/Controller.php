<?php
require_once './model/Model.php';
require_once './view/View.php';

class Controller { 

    private $view;
    private $model;


    public function __construct(){
        $this->view= new View();
        $this->model= new Model();
    }


    public function showHome(){
        $consolas=$this->model->getConsolas();
        $this->view->showHomeView($consolas);
    }
////////////////////////////////////////////////
    public function getConsola(){/////////////EN IMPLEMENTACION
        $this->view->showGetForm();
        $id = $_POST['ID'];
 
        if($id){
            $consola=$this->model->getConsola($id);
            if($consola){
                $this->view->showConsola($consola);
            }
            else{
                $this->view->showErrorForm();
            }
        }
        else{
            echo "error de tipeo";
        }
       
    }
   /* public function getConsolaa(){
        $this->view->showGetForm();
        $id = $_POST['ID'];
       
        if($id){
            $consola=$this->model->getConsola($id);
        }
        return $consola;
    }*/

    public function updateConsola(){
        
        $this->view->showUpdateForm();
        
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $id = $_POST['ID'];

        if($id){
            $consola=$this->model->getConsola($id);
            if($consola){
                $this->model->updateConsola($nombre,$marca,$id);
                echo "cambio realizado";
            }
            else{
                echo "no existe un archivo con el id $id";
            }
        }



    }





////////////////////////////////////////////////////
    public function addConsola(){
        $this->view->showForm();
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])||(!isset($_POST['marca']) || empty($_POST['marca']))) {
            $this->view->showErrorForm();
        }
        else{

            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
        
            $this->model->addConsolaBd($nombre,$marca);
            
        }
        $this->showHome();
    }

    public function deleteConsola(){
        $this->view->showDeleteForm();
    
        if (!isset($_POST['ID']) || empty($_POST['ID'])){
            echo $this->view->showErrorForm();
        }
        else{ 
            $id=$_POST['ID'];
            $this->view->showDeleteConsola($id);
            $consola=$this->model->getConsola($id);
                if($consola){
                    $this->model->deleteConsolaBd($id);
                    echo "borrado";
                }else{
                    echo $this->view->showErrorForm();
                }
            
        }
        $this->showHome();
    }

    public function getForm(){  
    
        
        return $consolaNueva = $_POST['nombre']; 
    }

}