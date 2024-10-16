<?php
    include 'db.php';

    $sql_pelikulak="SELECT Izena, ISAN, urtea FROM Pelikulak";
    $pelikulak= mysqli_query($conn,$sql_pelikulak);
    
    $sql_puntuazioa="SELECT Id, Izena, puntuak FROM Puntuazioa";
    $puntuak= mysqli_query($conn,$sql_puntuazioa);

    function id_atera($izena){
        include 'db.php';
        $sql_ida= "SELECT id FROM Erabiltzaileak WHERE Izena LIKE '$izena'";
        $ida_emaitza=mysqli_query($conn,$sql_ida);

        $ida= $ida_emaitza->fetch_assoc();
        $ida2= $ida["id"];
        
        mysqli_close($conn);
        return $ida2;
    }
?>