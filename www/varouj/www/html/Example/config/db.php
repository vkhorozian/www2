<?php
    class db{
        //Properties
        private $dbhost = '192.168.0.105';
        private $dbuser = "root";
        private $dbpass = "root";
        private $dbname = "rabbit1DB";

        //Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO(mysql_connect_str, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }