
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kotxea ezabatu</h1>
    <form action="delete.php" method="post">
        <input type="hidden" name="ezabatu" value="ezabatu_kotxea">
        <label>Matrikula</label><br>
        <select name="kotxeak" id="kotxeak">
            <option value="7564KLM">7564KLM</option>
            <option value="606FST">606FST</option>
            <option value="FCY820">FCY820</option>
        </select>
        <input type="submit">
    </form>

    <h1>Jabea Ezabatu</h1>
    <form action="delete.php" method="post">
        <input type="hidden" name="ezabatu" value="ezabatu_jabeak">
        <label>Jabeak</label><br>
        <select name="jabeak" id="jabeak">
            <option value="Julen,1">Julen</option>
            <option value="Iker,2">Iker</option>
            <option value="Xabi,3">Xabi</option>
        </select>
        <input type="submit">
    </form>
</body>
</html>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["ezabatu"]=="ezabatu_kotxea"){
           echo $_POST["kotxeak"]; 
        }
    }  

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["ezabatu"]=="ezabatu_jabeak"){
            $a=explode(",",$_POST["jabeak"]);
           echo $a[0]."<br>";
           echo $a[1]."<br>";
           echo "DELETE FROM jabeak WHERE id=".$a[1]." and izena like ".$a[0]; 
        }
    }   

?>