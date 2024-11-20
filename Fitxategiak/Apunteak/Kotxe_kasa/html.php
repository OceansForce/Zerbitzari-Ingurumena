

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
    <form action="gehitu.php" method="get">
        <button type="submit">Gehitu</button>
    </form>

    <table style="width:100%;text-align: center;">
        <tr>
            <th>ID</th>
            <th>Matrikula</th>
            <th>Matrikulazio Data</th>
            <th>Itv</th>
            <th>Jabe ID</th>
        </tr>
            
    </table>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a= explode(",", $_POST["jabeak"]);
        echo $a[0] ."  ".$a[1];

        if($a[0]!== "Jabe gabe"){
            $sql_id_atera= "SELECT id FROM jabeak WHERE izena like "."'".$a[0]."'";
            $id= mysqli_query($conn, $sql_id_atera);
    
            foreach ($id as $key) {
                $sql_aldatu_jabea ="UPDATE kotxeak SET jabea_id=".$key["id"]."  WHERE id=".$a[1]." ";
            }
            mysqli_query($conn, $sql_aldatu_jabea);
        }else {
            $sql_aldatu_jabea ="UPDATE kotxeak SET jabea_id=null  WHERE id=".$a[1]." ";
            mysqli_query($conn, $sql_aldatu_jabea);
        }
        header("Location: " . 'html.php');
        exit; // Terminar la ejecución del script para evitar errores.
    }
?>