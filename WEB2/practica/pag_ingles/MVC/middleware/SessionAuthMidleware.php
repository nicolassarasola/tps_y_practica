<?php 

function sessionAuthMiddleware($res){
    session_start();
    if(isset($_SESSION['ID_USER'])){

        $user = new stdClass();

        $user->username=$_SESSION['EMAIL_USER'];
        $user->id=$_SESSION['ID_USER'];
        return;
    }



}