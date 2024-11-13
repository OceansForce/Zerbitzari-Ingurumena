<?php
    require_once '../models/kaxak.php';

    class KaxakController{
        private $kaxak= [];

        public function __construct(){}

        public function addKaxa($kolorea){
            $kaxa= new Kaxak($kolorea);
            $this->kaxak[] = $kaxa;
        }

        public function getKaxak(){
            $conn= new db();
            $conn->conn();

            $sql = "SELECT Kolorea FROM Kaxak";
            $emaitza= mysqli_query($conn,$sql);
            if (mysqli_num_rows($emaitza)> 0){
                $i=1;
                foreach($emaitza as $fila){

                    $kaxak[$i] = $fila;
                    $i++;
                }
                
            }
            return $this->kaxak;
        }
    }
?>