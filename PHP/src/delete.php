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
    </form>
    <h1>Ezbatu</h1><br>
    <form action="delete.php" method="post">
        <input type="hidden" name="ezabatu" value="dentistak">
        <select name="dentistak" id="dentistak">
            <?php
                foreach ($dentistak as $value) {
                    echo "<option value='".$value["id"]."-".$value["izena"]."-".$value["abizena"]."'>".$value["id"]."-".$value["izena"]." ".$value["abizena"]."</option>";
                }
            ?>
            
        </select>
        <input type="submit">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["ezabatu"]=="dentistak"){
                $datuak= explode("-", $_POST["dentistak"]);
                echo $datuak[0];
                $sql_delet_dentista="DELETE FROM dentistak WHERE id=".$datuak[0]."";
                mysqli_query($conn, $sql_delet_dentista);
            }
        }  
    ?>
</body>
</html>