<?php

    class Model{

        protected $db;

        public function __construct() {
            $this->db = new PDO(
            "mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        }
    
        public function getAllWords($orderBy){


            $sql= 'SELECT * FROM ingles ';

            if($orderBy){
              switch($orderBy){
                case 'palabra':
                    $sql .= 'ORDER BY palabra';
                    break;

                case 'palabra':
                    $sql .= 'ORDER BY palabra';
                    break;
              } 
            }

            $query = $this->db->prepare($sql);
            $query->execute();

        }

    }