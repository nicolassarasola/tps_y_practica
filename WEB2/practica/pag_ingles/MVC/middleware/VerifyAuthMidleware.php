<?php

function verifyAuthMiddleware($res){

    if($res->username){
        return;
    }
    else{
        return header('location: '.BASE_URL.'showLogin');
        die();
    }

}