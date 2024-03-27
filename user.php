<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
</head>
<body>
        <h1>USER</h1>

        <?php 
            include './menu.php';
        ?>

        <?php
            $host="localhost";
            $dbuser="root";
            $dbpassword="";
            $dbname="project";

            $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

            if(!$conn){
                die (mysqli_connect_error() . "error");
            }
            $logged = $_SESSION['user'];
            $seegrade = "SELECT ocena, opis, przedmiot FROM oceny WHERE login = '$logged'";

            $rezultat = mysqli_query($conn, $seegrade);

            if (mysqli_num_rows($rezultat) > 0) {
                echo "oceny: " . "<br>";
                while($row = mysqli_fetch_assoc($rezultat)) {
                  echo $row['ocena'] . "    |" . $row['opis'] . "| " . "     |" .  $row["przedmiot"] . "|" ."<br>" .
                  "-----------------------------------------" . "<br>";
                }
              }
        ?>
</body>
</html>