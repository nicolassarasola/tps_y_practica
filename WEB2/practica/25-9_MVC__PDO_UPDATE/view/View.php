<?php

class View{
   
   public function __construct(){
    
   }
   
    public function showForm(){
        require_once './template/form.phtml';
    }

    public function showConsolas($consolas){
        //esto puede ser un template
        'ul';
        foreach($consolas as $consola) {
            echo '<li>'.$consola->nombre.'</li>';
        }
        '/ul';

    }
    public function showConsola($consola){
        
       echo $consola->nombre." ".$consola->marca;

    }

    public function showHomeView($consolas){
        $this->showConsolas($consolas);
        require_once'./template/inputs.phtml';
    }
    public function showErrorForm(){
        echo '<h4>reingrese los datos correctamente</h4>';
    }
    public function showDeleteForm(){
        require_once'./template/formDelete.phtml';
    }
    public function showDeleteConsola($id){
        echo "<h4>ID a eliminar: " . $id."</h4>";
    }
    public function showGetForm(){
        require_once './template/formGet.phtml';
    }
    public function showUpdateForm(){
        require_once './template/formUpdate.phtml';   
    }
}