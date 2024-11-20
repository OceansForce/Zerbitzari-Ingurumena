<?php
    require_once 'db.php';
    $db= new Db;

    $conn= $db->konexioa();

    $sql_dentistak="SELECT * FROM dentistak";
    $dentistak= mysqli_query($conn, $sql_dentistak);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    p{
        color:red;
    }
</style>
<body>
    <form action="Erakutsi.php" method="get">
        <button type="submit">Erakutsi</button>
    </form><br>
    <h1>Aldatu Dentista</h1><br>
    <p>Oharra: Bearreskoa da orria berris kargatzea aldaketak ikusteko</p><br>
    <form action="update.php" method="post">
        <input type="hidden" name="update" value="dentistak_aldatu">
        <select name="dentista" id="dentistak">
            
            <?php
               foreach ($dentistak as $value) {
                echo "<option value='".$value["id"].",".$value["izena"].",".$value["abizena"]."'>".$value["id"]."-".$value["izena"]." ".$value["abizena"]."</option>";
            }
            ?>
        </select>
        <input type="submit">
    </form><br><br>

    
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["update"]=="dentistak_aldatu"){
            
            $datuak= explode(",", $_POST["dentista"]);
            
            $sql_aukera= "SELECT * FROM dentistak WHERE id=".$datuak[0]." ";
            $aukera=mysqli_query($conn, $sql_aukera);

            foreach ($aukera as $value) {
                if ($value["oporretan"]==1){
                    echo "<form action='update.php' method='post'>
                        <input type='hidden' name='update' value='aldatu'>
                        <input type='hidden' name='id' value='".$datuak[0]."'>
                        <label>Izena</label><br>
                        <input type='text' name='izena' value='".$value["izena"]."'><br>
                        <label>Abizena</label><br>
                        <input type='text' name='abizena' value='".$value["abizena"]."'><br>
                        <label>DNI</label><br>
                        <input type='text' name='DNI' value='".$value["dni"]."'><br>
                        <label>Jaiotze-data</label><br>
                        <input type='date' name='data' value='".$value["jaiotze_data"]."'><br>
                        <label>Oporretan</label><br>
                        True:<input type='radio' name='oporrak' value='true' checked><br>
                        False:<input type='radio' name='oporrak' value='false'><br>
                        <input type='submit'>
                    </form>";
                }else{
                    echo "<form action='update.php' method='post'>
                        <input type='hidden' name='update' value='aldatu'>
                        <input type='hidden' name='id' value='".$datuak[0]."'>
                        <label>Izena</label><br>
                        <input type='text' name='izena' value='".$value["izena"]."'><br>
                        <label>Abizena</label><br>
                        <input type='text' name='abizena' value='".$value["abizena"]."'><br>
                        <label>DNI</label><br>
                        <input type='text' name='DNI' value='".$value["dni"]."'><br>
                        <label>Jaiotze-data</label><br>
                        <input type='date' name='data' value='".$value["jaiotze_data"]."'><br>
                        <label>Oporretan</label><br>
                        True:<input type='radio' name='oporrak' value='true'><br>
                        False:<input type='radio' name='oporrak' value='false' checked><br>
                        <input type='submit'>
                    </form>";
                }
                
            }
            
        }
    }
?>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["update"]=="aldatu"){
            
            if(strlen($_POST["DNI"])!=9 || strlen($_POST["data"])!=10 || ($_POST["oporrak"]!="true" && $_POST["oporrak"]!="false")){
                echo "Datuak gaixki daude";
            }else {
                $sql_update="UPDATE dentistak SET izena='".$_POST["izena"]."', abizena='".$_POST["abizena"]."', dni='".$_POST["DNI"]."', jaiotze_data='".$_POST["data"]."', oporretan=".$_POST["oporrak"]." WHERE id=".$_POST["id"]."";
                mysqli_query($conn, $sql_update);
            }
        
        }
    } 
?>