<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>kotxeak</h1>
    <form action="gehitu.php" method="post">
        <input type="hidden" name="gehitu" value="kotxeak">
        Matrikula:<input type="text" name="matrikula"><br>
        <input type="date" name="data" ><br>
        true:<input type="radio" name="itv" value="true"><br>
        false<input type="radio" name="itv" value="false"><br>
        <input type="submit">
    </form>

    <h1>Jabeak</h1>
    <form action="gehitu.php" method="post">
        <input type="hidden" name="gehitu" value="jabeak">
        DNI: <input type="text" name="DNI"><br>
        Izena: <input type="text" name="Izena"><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["gehitu"]=="kotxeak"){
            echo $_POST["matrikula"]."<br>".$_POST["data"]."<br>".$_POST["itv"]."<br>";
            echo "INSERT INTO kotxeak (jabea_id, matrikula, matrikulazio_data, itv)
            VALUES (null,'".$_POST["matrikula"]."', '".$_POST["data"]."', ".$_POST["itv"].")<br>";

            echo strlen($_POST["matrikula"]);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["gehitu"]=="jabeak"){
            echo $_POST["DNI"]."<br>".$_POST["Izena"];
        }
    }
?>