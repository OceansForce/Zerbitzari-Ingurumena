<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $zenb1=3;
    $zenb2=3;

    $texto="Aldagaila";
    echo '<p>Kaixo Mundua, $texto</p><br>';
    echo '<p>phpversion</p><br>';
    /* Comentario*/
    echo '$zenb1+$zenb2<br>';
    var_dump($zenb1);
    var_dump($texto);

    function funcion1(){
        echo '<br><p>Primera Funcion</p><br>';
    }
    funcion1();

    function funcion2(){
        $GLOBALS['zenb1']=$GLOBALS['zenb1']+$GLOBALS['zenb2'];
    }
    
    funcion2();
    echo $zenb1;

    function funcion3() {
        static $x = 0;
        echo $x;
        $x++;
    }
      
      
    ?>
</body>
</html>

