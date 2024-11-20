<?php
    class Db{

        public function __construct() {
            
        }
        
            private $serbitzaria="db";
            private $erabiltzailea="root";
            private $pazaitza="root";
            private $datu_basea="mydatabase";

            

            public function konexioa(){
                try {
                    $conn= new mysqli($this->serbitzaria, $this->erabiltzailea, $this->pazaitza, $this->datu_basea);
                    return $conn;
                } catch (PDOException) {
                    echo "Konexio errorea".$conn->connect_error;
                }
            }
    }
?>