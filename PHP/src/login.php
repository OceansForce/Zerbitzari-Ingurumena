<?php 
    include 'konexioa.php';
    //ob_start();
    $ondo=true;
    $izena;
    $gmail;
    $pasahitza;
   
    /*if (isset($_COOKIE["Erabiltzaile_Izena"])){
        if($_COOKIE["Erabiltzaile_Izena"]!==$izena){
            header("Location: index.html");
            exit;
        }
    }else {
        header("Location: index.html");
            exit;
    }*/

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "Erabiltzailea:<br>";
        if (empty($_POST["izena"])){
            echo "Ez da jarri IZENA";
            $ondo=false;
        }else{
            $izena= password_hash($_POST["izena"], PASSWORD_DEFAULT);
            echo $_POST["izena"];
        }
        echo "<br>";
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $gmail= password_hash($_POST["email"], PASSWORD_DEFAULT);
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
            $pasahitza= password_hash($_POST["pasaitza"], PASSWORD_DEFAULT);
            
        }  

        $sql = "SELECT Izena, Gmail, Pasahitza FROM Erabiltzaileak";
        $emaitza= mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($emaitza)> 0){
            while($fila=mysqli_fetch_assoc($emaitza)){
                if ($fila["Izena"] == $_POST["izena"] && $fila["Gmail"] == $_POST["email"] && $fila["Pasahitza"] == $_POST["pasaitza"]){
                    $ondo=true;
                }
            }
        }else{
            $ondo=false;
            echo "Db errorea";
        }
        mysqli_close($conn);

        echo "<br>";
        echo "<form method='POST' action='saioa_itxi.php'>
        <button>Itxi saioa</button>
        </form>";
        if ($ondo===true){
            setcookie("Erabiltzaile_Izena", $izena, 0);
            setcookie("Gmail", $gmail, 0);
            setcookie("Pasahitza", $pasahitza, 0);
        }

    }

   // ob_end_flush();
    
?>