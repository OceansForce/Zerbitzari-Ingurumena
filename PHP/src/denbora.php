<?php
    require_once 'db.php';

    $herria = "sdfsdf";
    $eguna;
    $ordua;

    $db = new DB();

    $conn= $db -> konexioa();

    $sql_herriak= "SELECT Izena FROM Herria";
    $herriak= mysqli_query($conn, $sql_herriak);

    function eguna_atera($herria){
        $db = new DB();

        $conn= $db -> konexioa();
    
        $sql_eguna_aukera= "SELECT * FROM Iragarpena_eguna WHERE herria like '$herria'";
        $eguna_aukera= mysqli_query($conn, $sql_eguna_aukera);
        return $eguna_aukera;
    }
   
    function ordua_atera($eguna, $herria){
        $db = new DB();

        $conn= $db -> konexioa();

        $sql_ordu_aukera= "SELECT * FROM Iragarpena_orduko WHERE Eguna=$eguna and id_eguna= (SELECT Id_eguna FROM Iragarpena_eguna WHERE herria like '$herria' and Eguna=$eguna)";
        $ordu_aukera= mysqli_query($conn, $sql_ordu_aukera);
        
        return $ordu_aukera;
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
    <form method="POST" action="denbora.php" >
        <input type="hidden" name="formulario_id" value="herria_form">
        <select name="herriak" id="herriak" name="form_">
            <?php
                foreach ($herriak as $key ) {
                    echo "<option value='".$key["Izena"]."'>".$key["Izena"]."</option>";
                }
            ?>
        </select>
        <input type="submit">
    </form>
    

    <form method="POST" action="denbora.php">
        <input type="hidden" name="formulario_id" value="egunak_form">
        <select name="egunak" id="egunak" name="form_">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["formulario_id"]=="herria_form"){
                    $herria=$_POST["herriak"];
                    $egunak= eguna_atera($herria);
                   
                    foreach ($egunak as $key) {
                        echo "<option value='".$key["eguna"]."'>".$key["eguna"]."</option>";                    
                    }
                }
            }
        ?>
        <input type="submit" >
        </select>
    </form>

    <form method="POST" action="denbora.php">
        <input type="hidden" name="formulario_id" value="ordua_form">
        <select name="orduak" id="orduak" name="form_">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["formulario_id"]=="egunak_form"){
                    $eguna=$_POST["egunak"];
                    echo $herria;
                    $orduak= ordua_atera($eguna, $herria);
                       
                    foreach ($orduak as $key) {
                        echo "<option value='".$key["orduak"]."'>".$key["ordua"]."</option>";                    
                    }
                }
            }
        ?>
        <input type="submit" >
        </select>
    </form>
    
</body>
</html>