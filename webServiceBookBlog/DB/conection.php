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
            //$this->dbname = "BOOKBLOG";

            $this->servername = "159.223.191.152";
            $this->username = "remote";
            $this->password = "super-secret";
            $this->dbname = "BOOKBLOG";
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