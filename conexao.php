<?php
require "config.php";
    class conexao{

        private $connection;

        public function getConnection(){
            $connection = new PDO(dsn, user, password, options);
            return $connection;
        }



    }




?>