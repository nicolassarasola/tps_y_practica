<?php 
class AuthModel{
    private $db;

    public function __construct(){
        $this->db=new PDO('mysql: host=localhost; dbname=ingles; charset=utf8','root','');
    }

    public function getUserByUsername($username){
        $query=$this->db->prepare('SELECT * FROM users WHERE username=?');
        $query->execute([$username]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}