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
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
    <form action="delete.php" method="get">
        <button type="submit">Ezabatu</button>
    </form>
    <form action="insert.php" method="get">
        <button type="submit">Gehitu</button>
    </form>
    <table style="width:100%;text-align: center;">
        <tr>
            <th>id</th>
            <th>Izena</th>
            <th>Abizena</th>
            <th>DNI</th>
            <th>Jaiotza_data</th>
            <th>Oporretan</th>
        </tr>
        
        <?php
            foreach ($dentistak as $value) {
                echo "<tr><td>".$value["id"]."</td><td>".$value["izena"]."</td><td>".$value["abizena"]."</td><td>".$value["dni"]."</td><td>".$value["jaiotze_data"]."</td><td>".$value["oporretan"]."</td></tr>";
            }
        ?>
    </table>
</body>
</html>