<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form method="POST" action="formulario.php">
        Name:<input type="text" name="izena"><br>
        E-mail:<input type="text" name="email"><br>
        Password:<input type="password" name="pasaitza"><br>
        Fitxategia:<input type="file"  name="file"><br>
        Gender:
            <input type="radio" name="gender" value="Gizona">Gizona 
            <input type="radio" name="gender" value="emakumea">Emakumea
            <input type="radio" name="gender" value="beste">Beste bat<br>
        Textare:<textarea name="textare" rows="5" cols="40"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>