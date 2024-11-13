<?php
    include 'db.php';

    $sql_herriak= "SELECT Izena FROM Herria";
    $herriak= mysqli_query($conn, $sql_herriak);

    function eguna_atera($herria){
        $sql_eguna_aukera= "SELECT * FROM Iragarpena_eguna WHERE herria like ".$herria;
        return $sql_eguna_aukera;
    }
   
    function ordua_atera($eguna){
        $sql_ordu_aukera= "SELECT * FROM Iragarpena_orduko WHERE Eguna like ".$eguna;
        return $sql_ordu_aukera;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="denbora.php">
        <select name="herriak" id="herriak" name="form_">
            <?php
                foreach ($herriak as $key ) {
                    echo "<option value='".$key["Izena"]."'>".$key["Izena"]."</option>";
                }
            ?>
        </select>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST[""]){

            }
        }
    ?>
</body>
</html>