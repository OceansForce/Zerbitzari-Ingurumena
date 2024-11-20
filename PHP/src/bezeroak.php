<?php
    require_once 'db.php';
    $db= new Db;

    $conn= $db->konexioa();
    
    $sql_bezeroak="SELECT * FROM bezeroak";
    $bezeroak= mysqli_query($conn, $sql_bezeroak);
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
    <form action="Erakutsi.php" method="get">
        <button type="submit">Erakutsi</button>
    </form>
    <table style="width:100%;text-align: center;">
            <tr>
                <th>Id</th>
                <th>Izena</th>
                <th>Abizena</th>
                <th>DNI</th>
                <th>Jaiotza-data</th>
                <th>Id_dentista</th>
            </tr>
            <?php
                foreach ($kotxeak as $key) {
                    echo "<tr><td>".$key["id"]."</td><td>".$key["matrikula"]."</td><td>".$key["matrikulazio_data"]."
                    </td><td>".$key["itv"]."</td><td>".$key["jabea_id"]."
                    </td><td> <form action='html.php' method='POST'><select name='jabeak' id='jabeak' name='form__'>";

                    if($key["jabea_id"]==null){
                        echo "<option value='Jabe gabe,".$key["id"]."'>Jabe gabe</option>";
                    }

                    foreach ($jabeak as $key1) {
                        if($key1["id"]==$key["jabea_id"]){
                            echo "<option value='".$key1["izena"].",".$key["id"]."'>".$key1["izena"]."</option>";
                        }
                    }

                    foreach ($jabeak as $key1) {
                        if($key1["id"]!=$key["jabea_id"]){
                            echo "<option value='".$key1["izena"].",".$key["id"]."'>".$key1["izena"]."</option>";
                        }
                    }

                    if ($key["jabea_id"]!=null){
                        echo "<option value='Jabe gabe,".$key["id"]."'>Jabe gabe</option>";
                    }
                    
                    echo "</select> <input type='submit'></form>
                    </td></tr>";
                }
            ?>
        </table>
</body>
</html>