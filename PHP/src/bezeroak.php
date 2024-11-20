<?php
    require_once 'db.php';
    $db= new Db;

    $conn= $db->konexioa();
    
    $sql_bezeroak="SELECT * FROM bezeroak";
    $bezeroak= mysqli_query($conn, $sql_bezeroak);

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
                foreach ($bezeroak as $key) {
                    echo "<tr><td>".$key["id"]."</td><td>".$key["izena"]."</td><td>".$key["abizena"]."
                    </td><td>".$key["dni"]."</td><td>".$key["jaiotze_data"]."
                    </td><td>".$key["dentista_id"]."</td><td> <form action='bezeroak.php' method='POST'><select name='bezeroak' name='form__'>";

                    if($key["dentista_id"]==null){
                        echo "<option value='Dentita gabe,".$key["id"]."'>Dentita gabe</option>";
                    }

                    foreach ($dentistak as $key1) {
                        if($key1["id"]==$key["dentista_id"]){
                            echo "<option value='".$key1["izena"].",".$key["id"]."'>".$key1["izena"]."</option>";
                        }
                    }

                    foreach ($dentistak as $key1) {
                        if($key1["id"]!=$key["dentista_id"]){
                            echo "<option value='".$key1["izena"].",".$key["id"]."'>".$key1["izena"]."</option>";
                        }
                    }

                    if ($key["dentista_id"]!=null){
                        echo "<option value='Dentita gabe,".$key["id"]."'>Dentita gabe</option>";
                    }
                    
                    echo "</select> <input type='submit'></form>
                    </td></tr>";
                }
            ?>
        </table>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $a= explode(",", $_POST["bezeroak"]);
        
                if($a[0]!== "Dentita gabe"){
                    $sql_id_atera= "SELECT id FROM dentistak WHERE izena like "."'".$a[0]."'";
                    $id= mysqli_query($conn, $sql_id_atera);
            
                    foreach ($id as $key) {
                        $sql_aldatu_dentista ="UPDATE bezeroak SET dentista_id=".$key["id"]."  WHERE id=".$a[1]." ";
                    }
                    mysqli_query($conn, $sql_aldatu_dentista);
                }else {
                    $sql_aldatu_dentista ="UPDATE bezeroak SET dentista_id=null  WHERE id=".$a[1]." ";
                    mysqli_query($conn, $sql_aldatu_dentista);
                }
                
            }
        ?>
</body>
</html>