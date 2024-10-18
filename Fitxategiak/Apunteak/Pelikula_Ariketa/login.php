<?php 
    include 'db.php';
    
    $ondo=true;
    $izena;
    $gmail;
    $pasahitza;
   

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if (empty($_POST["izena"])){
            echo "Ez da jarri IZENA";
            $ondo=false;
        }else {
            $izena= $_POST["izena"];
        }
        
        if (empty($_POST["pasaitza"])){
            echo "Ez da jarri Pasahitza";
            $ondo=false;
        }else{
            $pasahitza= $_POST["pasaitza"]; 
        }  

        if ($ondo==true){

            $sql = "SELECT Id, Izena, Pasahitza FROM Erabiltzaileak";
            $emaitza= mysqli_query($conn,$sql);
            if (mysqli_num_rows($emaitza)> 0){
                while($fila=mysqli_fetch_assoc($emaitza)){
                
                    if ($fila["Izena"] == $_POST["izena"] && $fila["Pasahitza"] == $_POST["pasaitza"]){
                        
                        setcookie("Erabiltzaile_Izena", $izena, 0);
                        setcookie("id", $fila["Id"], 0);
                        header("Location: html.php");
                        exit();
                        
                    }else{
                        $ondo=false;
                        echo "Db errorea";  
                    }
                }
            }else{
                $ondo=false;
                echo "Db errorea";
            }
           
            mysqli_close($conn);
        }
        
        
        
    }
    
?>