
<?php
    include 'db.php';
?>

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

        $sql_pelikulak="SELECT Izena, ISAN, urtea FROM Pelikulak";
        $pelikulak= mysqli_query($conn,$sql_pelikulak);
        
        $id=$_COOKIE["id"];

        $sql_puntuazioa_erabiltzailea="SELECT Id, Izena, puntuak FROM Puntuazioa WHERE Id=$id";
        $puntuak_erabiltzailea= mysqli_query($conn,$sql_puntuazioa_erabiltzailea);

        function id_atera($izena){
            include 'db.php';
            $sql_ida= "SELECT id FROM Erabiltzaileak WHERE Izena LIKE '$izena'";
            $ida_emaitza=mysqli_query($conn,$sql_ida);

            $ida= $ida_emaitza->fetch_assoc();
        
            mysqli_close($conn);
            return $ida["id"];
        }
    ?>


    <?php
        $izena=$_COOKIE["Erabiltzaile_Izena"];
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
                foreach($puntuak_erabiltzailea as $row2){
                    if($row2["Izena"]==$row["Izena"] && $row2["puntuak"]!=null){
                        echo "<td>".$row2["puntuak"]."</td></tr>";
                    }
                    
                }
            }
            echo"</table>";
    ?>
    <br>
    <form method="POST" action="html.php">
        <label>Pelikulak</label><br>
        <select name="pelikulak" id="pelikulak">
            <?php
                foreach($pelikulak as $row){
                    echo "<option value='". $row["Izena"]."'>". $row["Izena"]."</option>";
                }
            ?>
        </select>
        <br><br>
        <label for="">Puntuazioa</label>
        <br>
        <input type="number" name="puntuak" min="0" max="10">
        <input type="submit">
    </form>
    <?php
        $eguneratu=true;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (0>$_POST["puntuak"]){
                $eguneratu=false;
                echo "Puntuak jarri gabe";
            }else{
                $puntu_berria=$_POST["puntuak"];
            }
            
            $pelikula=$_POST["pelikulak"];  
            
            if($eguneratu){
                $sql = "SELECT Id, Izena, puntuak FROM Puntuazioa WHERE Izena like '$pelikula' and Id='$id'";
                $emaitza= mysqli_query($conn,$sql);
                if (mysqli_num_rows($emaitza)== 0){
                    echo "Inser";
                    $puntuak_insert="INSERT INTO Puntuazioa (id, Izena, puntuak) VALUES ('$id', '$pelikula', '$puntu_berria')";
                    $exekuzioa=mysqli_query($conn,$puntuak_insert);
                }else{
                    $sql_eguneratu="UPDATE Puntuazioa set puntuak='$puntu_berria' WHERE Izena like '$pelikula'";
                    $exekuzioa=mysqli_query($conn,$sql_eguneratu);
                }

                
            }

                  
        }  
       
        
    ?>
</body>
</html>