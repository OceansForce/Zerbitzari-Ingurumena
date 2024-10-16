
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css.css">
    <title>Document</title>
</head>

<body>
    
    <?php
        include 'datuak.php';
        $izena=htmlspecialchars($_GET['izena']);
        echo  "<h4>Erabiltzailea: ".$izena."</h4><br>";
        echo"
        <table border='1' >
            <tr>
                <th>Izena</th>
                <th>ISAN</th>
                <th>Urtea</th>
            </tr>";
            
        foreach($pelikulak as $row){
            echo "<tr><td>".$row["Izena"]."</td><td>".$row["ISAN"]."</td><td>".$row["urtea"]."</td>";
            foreach($puntuak as $row2){
                if($row2["Izena"]==$row["Izena"] && id_atera($row2["Izena"])==$row2["id"]){
                    echo "<td>".$row2["puntuak"]."</td></tr>";
                }
            }
        }
        echo"</table>";
    ?>
    
        
    
    
</body>
</html>