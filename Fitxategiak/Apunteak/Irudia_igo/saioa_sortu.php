<?php
    include 'konexioa.php';
    $irudi_dir="./irudiak/";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $izena = mysqli_real_escape_string($conn, $_POST["izena"]);
        $pasaitza = mysqli_real_escape_string($conn, $_POST["pasaitza"]);
        $irudia= mysqli_real_escape_string($conn, $_POST["irudia"]);

        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $sql_select = "SELECT Izena, Gmail, Pasahitza FROM Erabiltzaileak WHERE Gmail LIKE '$email'";
        $emaitza= mysqli_query($conn,$sql_select);
 
        if (mysqli_num_rows($emaitza)<= 0){
            $sql_insert="INSERT INTO Erabiltzaileak (Izena, Gmail, Pasahitza, Irudia) VALUES ('$izena', '$email', '$pasaitza',  '$irudia')";
            $stmt = $conn->prepare($sql_insert);
            $exekutatu= mysqli_query($conn,$sql_insert);
            echo "Erabiltzailea:<br>";
            echo $_POST["izena"];
            echo "<br>";
            echo $_POST["email"];
            echo "<br>";
            echo "<br>";
            echo "<form method='POST' action='saioa_itxi.php'>
            <button>Itxi saioa</button>
            </form>";
        } else{   
            echo "Erabiltzailea existitzen da.";
        }
    }   
    mysqli_close($conn);
?>