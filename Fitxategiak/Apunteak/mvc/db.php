<?php
    class db{
        function __construct(){
            $serbitzaria="db";
            $erabiltzailea="root";
            $pazaitza="root";
            $datu_basea="mydatabase";

            $conn=new mysqli($serbitzaria,$erabiltzailea,$pazaitza,$datu_basea);
    
            if ($conn->connect_error) {
                die("Konexio errorea". $conn->connect_error);
            }
        } 
    }
?>