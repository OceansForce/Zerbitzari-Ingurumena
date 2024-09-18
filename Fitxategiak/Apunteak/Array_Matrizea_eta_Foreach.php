<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<table border='1'>";
    $zenb1= array(array("Julen","Garcia","Mata"), array("Iker","Esnal","Etxebe"),array("Ana","Mata","Rodrigez"));
    
    //Escrito en formato JSON
    echo json_encode($zenb1, JSON_PRETTY_PRINT);

    //Formato table html
    /*foreach ($zenb1 as $key) {
        
        foreach ($key as $key2) {
            echo "<td>".$key2."</td>";
        }
    }*/
    echo "</table>"
    ?>
</body>
</html>

