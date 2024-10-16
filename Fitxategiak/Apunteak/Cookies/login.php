<?php 
   
    ob_start();
    $ondo=true;
    $izena;
    $gmail;
    $pasahitza;
   
    if (isset($_COOKIE["Erabiltzaile_Izena"])){
        if (empty($_POST["izena"])){
            header("Location: index.html");
            exit;
        }else{
            if(!password_verify($_POST["izena"], $_COOKIE["Erabiltzaile_Izena"])){
                header("Location: index.html");
                exit;
            }
        }
    }else {
        header("Location: index.html");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if (empty($_POST["izena"])){
            echo "Ez da jarri IZENA";
            $ondo=false;
        }else {
            $izena= password_hash($_POST["izena"], PASSWORD_DEFAULT);
        }
        
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $gmail= password_hash($_POST["email"], PASSWORD_DEFAULT);

        }else{
            echo "Ez da email bat ".$_POST["email"];
            $ondo=false;
        }

        
        if (empty($_POST["pasaitza"])){
            echo "Ez da jarri Pasahitza";
            $ondo=false;
        }else{
            $pasahitza= password_hash($_POST["pasaitza"], PASSWORD_DEFAULT);
            
        }  
    

        if ($ondo===true){

            setcookie("Erabiltzaile_Izena", $izena, 0);
            setcookie("Gmail", $gmail, 0);
            setcookie("Pasahitza", $pasahitza, 0);

            echo "Erabiltzailea:<br>";
            echo $_POST["izena"];
            echo "<br>";
            echo $_POST["email"];
            echo "<br>";
            echo "<br>";
            echo "<form method='POST' action='saioa_itxi.php'>
            <button>Itxi saioa</button>
            </form>";
        }
    }
    

   ob_end_flush();
    
?>