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

        $sql_ordu_aukera= "SELECT * FROM Iragarpena_orduko WHERE Eguna=$eguna and id_eguna= (SELECT Id_eguna FROM Iragarpena_eguna WHERE herria like '$herria' and eguna=$eguna)";
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
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
    
    <form method="POST" action="denbora.php" >
        <input type="hidden" name="formulario_id" value="herria_form">
        <select name="herriak" id="herriak" name="form_">
            <?php
                foreach ($herriak as $key ) {
                    echo "<option value='".$key["Izena"]."'>".$key["Izena"]."</option>";
                }
            ?>
        </select><br>
        <label >Herria ezabatu</label>
        <input type="submit" formaction="ezabatu.php" placeholder="Ezabatu"><br>
        <label>Datuak Ikusi</label>
        <input type="submit">
    </form> 
    
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if($_POST["formulario_id"]=="herria_form"){
                        echo "<table style='width:100%;text-align: center;'><tr style='width:100%'><th>Eguna</th><th style='width:20%'>Iragarpena-testua</th><th>Eguraldia</th><th>Minimoa</th><th>Maximoa</th><th>Orduak</th></tr>";
                        $herria=$_POST["herriak"];
                        $egunak=eguna_atera($herria);
                        foreach ( $egunak as $value) {
                            echo "<form method='POST' action='denbora.php' ><input type='hidden' name='formulario_id' value='eguna_form'><tr><td>".$value["eguna"]."</td><td >".$value["iragarpena-testua"]."</td><td>".$value["eguraldia"]."</td><td style='width:20%'>".$value["tenperatura-minimoa"]."</td><td>".$value["tenperatura-maximoa"]."</td><td><input type='hidden' name='ordua' value='".$value["eguna"].",".$herria."'><input type='submit' value='orduak'></td></form>";
                        }
                        echo  "</table>";
                    }
                }
            ?>
    <form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if($_POST["formulario_id"]=="eguna_form"){
                        echo "<table style='width:100%;text-align: center;'><tr style='width:100%'><th>Ordua</th><th>Eguraldia</th><th>Temperatura</th><th>Prezipitazioa</th><th>Haizea-nondik</th><th>Haizea-km/h</th></tr>";
                        $datuak=  explode(",", $_POST["ordua"]);
                        $id= $datuak[0];
                        $herria= $datuak[1];
                        
                        $orduak= ordua_atera($id, $herria);
                    
                        foreach ($orduak as $value) {
                            echo "<tr><td>".$value["ordua"]."</td><td >".$value["eguraldia"]."</td><td>".$value["tenperatura"]."</td><td>".$value["prezipitazioa"]."</td><td>".$value["haizea-nondik"]."</td><td>".$value["haizea-km/h"]."</td>";
                        }
                        echo "</table>";
                    }
                }
            ?>
    </form>
    
</body>
</html>