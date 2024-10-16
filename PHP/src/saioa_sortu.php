<?php
    include 'db.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $izena = mysqli_real_escape_string($conn, $_POST["izena"]);
        $pasaitza = mysqli_real_escape_string($conn, $_POST["pasaitza"]);

        $sql_select = "SELECT id, Izena, Pasahitza FROM Erabiltzaileak WHERE Izena LIKE '$izena'";
        $emaitza= mysqli_query($conn,$sql_select);
 
        if (mysqli_num_rows($emaitza)<= 0){
            $sql_max = "SELECT max(id) FROM Erabiltzaileak";
            $emaitza_max= mysqli_query($conn,$sql_max);

            
            $id_max= $emaitza_max->fetch_assoc();
            $id_max1= $id_max["max(id)"]+1;

            $sql_insert="INSERT INTO Erabiltzaileak (id, Izena, Pasahitza) VALUES ('$id_max1', '$izena', '$pasaitza')";
            $stmt = $conn->prepare($sql_insert);
            $exekutatu= mysqli_query($conn,$sql_insert);
    
        } else{   
            header("Location: html.php?izena=".urlencode($izena));
            exit();
        }
    }   
    mysqli_close($conn);
?>