<?php
    class DB{
        private $servername;
        private $username;
        private $password;
        private $dbname;

        public function __construct(){
            //$this->servername = "localhost";
            //$this->username = "root";
            //$this->password = "Pass741852963";
            //$this->servername = "159.223.191.152";
            $this->servername = "localhost";
            $this->username = "host";
            $this->password = "password";
            $this->dbname = "MAXTERSHOP";
        }

        function connect(){
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }
    }

?>