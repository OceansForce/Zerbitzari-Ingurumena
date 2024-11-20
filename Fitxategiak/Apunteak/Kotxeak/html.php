<?php
    require_once 'db.php';
    $db= new Db;

    $conn= $db->konexioa();

    $sql_kotxeal="SELECT * FROM kotxeak";
    $kotxeak= mysqli_query($conn, $sql_kotxeal);

    $sql_jabeak="SELECT * FROM jabeak";
    $jabeak=mysqli_query($conn, $sql_jabeak);

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
    

   
        <table style="width:100%;text-align: center;">
            <tr>
                <th>ID</th>
                <th>Matrikula</th>
                <th>Matrikulazio Data</th>
                <th>Itv</th>
                <th>Jabe ID</th>
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