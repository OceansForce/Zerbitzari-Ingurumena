<?php 
    $ondo;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["izena"])){
            echo "Ez da jarri IZENA";
            $ondo=false;
        }else{
            echo $_POST["izena"];
        }
        echo "<br>";
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === true){
            echo $_POST["email"];
            
        }else{
            echo "Ez da email bat ".$_POST["email"];
            $ondo=false;
        }
   
        echo "<br>";
        if (empty($_POST["pasaitza"])){
            echo "Ez da jarri Pasahitza";
            $ondo=false;
        }else{
            echo $_POST["pasaitza"];
        }  
        echo "<br>";
    }

    if ($ondo===true){
        setcookie($_POST["izena"], $_POST["email"],$_POST["pasaitza"], time() + (86400 * 30), "/");
    }
?>