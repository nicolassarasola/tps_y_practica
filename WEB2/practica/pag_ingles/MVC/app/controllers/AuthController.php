<?php
require_once './app/models/AuthModel.php';
require_once './app/views/AuthView.php';

class AuthController{

    private $model;
    private $view;

    public function __construct()
    {
       $model=new AuthModel();
       $view=new AuthView();   
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function login(){

        if(empty($_POST['user']||!isset($_POST['user']))){
            return $this->view->showError("user mal ingresado");
        }

        if(empty($_POST['password']||!isset($_POST['password']))){
           return $this->view->showError("password mal ingresado");
        }

        $user=$_POST['user'];
        $password=$_POST['password'];
    
        $userFromDb=$this->model->getUserByUsername($user);

        if($userFromDb && password_verify($password,$userFromDb->password)){

            session_start();

            $_SESSION['ID_USER']=$userFromDb->ID;
            $_SESSION['EMAIL_USER']=$userFromDb->user;

            header('location: '. BASE_URL);
        }
        else{
            return $this->view->showError("password incorrecto");
        }
    
    }

    public function logout(){
        session_start();
        session_destroy();
        header('location: '. BASE_URL);
    }

}