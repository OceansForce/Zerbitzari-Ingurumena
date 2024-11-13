<?php
    class Kaxak{
        private  $kolorea;
        public function __construct($kolorea){
            $this->kolorea= $kolorea;
        }
        public function getKolorea(){
            return $this->kolorea;
        }
    }
?>