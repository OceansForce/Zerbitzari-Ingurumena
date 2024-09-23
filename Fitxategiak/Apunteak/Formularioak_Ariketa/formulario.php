
<?php  
        
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["izena"])){
            echo "Ez da jarri IZENA";
        }else{
            echo $_POST["izena"];
        }
        echo "<br>";
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === true){
            echo $_POST["email"];
        }else{
            echo "Ez da email bat ".$_POST["email"];
        }
       
        echo "<br>";
        if (empty($_POST["pasaitza"])){
            echo "Ez da jarri Pasahitza";
        }else{
            echo $_POST["pasaitza"];
        }
        echo "<br>";
        echo $_POST["gender"];
        echo "<br>";
        echo $_POST["textare"];
        echo "<br>";
        echo nl2br(file_get_contents($_POST["file"]));
    }
?>


