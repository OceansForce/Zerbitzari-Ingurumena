<?php 
    include 'konexioa.php';
    
    $ondo=true;
    $izena;
    $gmail;
    $pasahitza;
   

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

        $sql = "SELECT Izena, Gmail, Pasahitza, Irudia FROM Erabiltzaileak";
        $emaitza= mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($emaitza)> 0){
            while($fila=mysqli_fetch_assoc($emaitza)){
                
                if ($fila["Izena"] == $_POST["izena"] && $fila["Gmail"] == $_POST["email"] && $fila["Pasahitza"] == $_POST["pasaitza"]){
                    $ondo=true;
                    $irudi_izena="./irudiak/".$fila["Irudia"];
                }else{
                    $ondo=false;
                    echo "Db errorea";  
                }
            }
        }else{
            $ondo=false;
            echo "Db errorea";
        }
        

        
        if ($ondo===true){
            echo "Erabiltzailea:<br>";
            echo $_POST["izena"];
            echo "<br>";
            echo $_POST["email"];
            echo "<br>";
            echo "<img src='$irudi_izena' >";
            echo "<br>";
            echo "<br>";
            echo "<form method='POST' action='saioa_itxi.php'>
            <button>Itxi saioa</button>
            </form>";
        }
        mysqli_close($conn);
    }
    
?>