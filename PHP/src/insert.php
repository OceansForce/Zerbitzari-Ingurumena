<?php
    require_once 'db.php';
    $db= new Db;

    $conn= $db->konexioa();
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
    </form>

    <h1>Gehitu Dentista</h1>
    <form action="insert.php" method="post">
        <input type="hidden" name="insert" value="dentistak">
        <label>Izena</label><br>
        <input type="text" name="izena"><br>
        <label>Abizena</label><br>
        <input type="text" name="abizena"><br>
        <label>DNI</label><br>
        <input type="text" name="DNI"><br>
        <label>Jaiotze-data</label><br>
        <input type="date" name="data"><br>
        <label>Oporretan</label><br>
        True:<input type="radio" name="oporrak" value="true"><br>
        False:<input type="radio" name="oporrak" value="false"><br>
        <input type="submit">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["insert"]=="dentistak"){
                if(strlen($_POST["DNI"])>9){
                    echo "DNIa gaixki dago";
                }else {
                    $izena= $_POST["izena"];
                    $abizena= $_POST["abizena"];
                    $dni= $_POST["DNI"];
                    $data= $_POST["data"];
                    $oporrak= $_POST["oporrak"];

                    $sql_insert_dentistak="INSERT INTO dentistak (izena, abizena, dni, jaiotze_data, oporretan)
                        VALUES ('".$izena."','".$abizena."', '".$dni."', '".$data."', ".$oporrak.")";
                    mysqli_query($conn, $sql_insert_dentistak);
                }
            }
        }
    ?>
</body>
</html>