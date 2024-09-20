<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //VOID Funtzio bat egitea
    suma(1,2);
    function suma($x, $y){
        echo $x+$y;
        echo "<br>";
    }

    $zenb1=2;
    geitu_1($zenb1);
    echo $zenb1;
    echo "<br>";
    geitu_2($zenb1);
    echo $zenb1;
    echo "<br>";
    function geitu_1($zenb){
        $zenb+=5;
    }
    
    function geitu_2(&$zenb){
        $zenb+=5;
    }
    ?>
</body>
</html>

