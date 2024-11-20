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
<body>
    <form action="Erakutsi.php" method="get">
        <button type="submit">Erakutsi</button>
    </form><br>
    <h1>Aldatu Dentista</h1><br>

    <form action="update.php" method="post">
        <input type="hidden" name="update" value="dentistak">
        <select name="dentistak" id="dentistak">
            
            <?php
               foreach ($dentistak as $value) {
                echo "<option value='".$value["id"]."-".$value["izena"]."-".$value["abizena"]."'>".$value["id"]."-".$value["izena"]." ".$value["abizena"]."</option>";
            }
            ?>
        </select>
        <input type="submit">
    </form>

    
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["update"]=="dentistak"){
            $datuak= explode("-", $_POST("dentistak"));
            $sql_aukera= "SELECT * FROM dentitak WHERE id=".$datuak[0]." ";
            $aukera=mysqli_query($conn, $sql_aukera);

            foreach ($aukera as $value) {
                echo "<form action='update.php' method='post'>
                    <input type='hidden' name='update' value='aldatu'>
                    <label>Izena</label><br>
                    <input type='text' name='izena' value='".$value["izena"]."'><br>
                    <label>Abizena</label><br>
                    <input type='text' name='abizena><br>
                    <label>DNI</label><br>
                    <input type='text' name='DNI'><br>
                    <label>Jaiotze-data</label><br>
                    <input type='date' name='data'><br>
                    <label>Oporretan</label><br>
                    True:<input type='radio' name='oporrak' value='true'><br>
                    False:<input type='radio' name='oporrak' value='false'><br>
                    <input type='submit'>
                </form>";
            }
            
        }
    }
?>