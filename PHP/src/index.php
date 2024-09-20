<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name:<input type="text"><br>
        E-mail:<input type="text"><br>
        <input type="submit">
    </form>

    <?php  echo $_GET["izena"]?>
</body>
</html>

