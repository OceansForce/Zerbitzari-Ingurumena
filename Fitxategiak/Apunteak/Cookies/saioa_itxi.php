<?php
    ob_start();
    $izena=null;
    $gmail=null;
    $pasahitza=null;

    setcookie("Erabiltzaile_Izena", $izena, time() +  - 3600, "/");
    setcookie("Gmail", $gmail, time()  - 3600, "/");
    setcookie("Pasahitza", $pasahitza, time()  - 3600, "/");
    
    header("Location: index.html");
    ob_end_flush();
?>