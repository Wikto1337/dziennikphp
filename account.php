<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>KONTO</h1>
    <?php 
        include "./menu.php";
        echo "<br>";
    ?>
    <form action="account.php" method="post">
        <label for="newpass">change password:</label>
        <input type="text" name="newpass" id="newpass">
        <button type="submit">change</button><br>
    </form>
    <?php
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="project";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        if(!$conn){
            die (mysqli_connect_error() . "error");
        }
        // $logged = $_SESSION['user'];
        // $selectacc = "SELECT * FROM users WHERE login = '$logged'";

        // $resulted = mysqli_query($conn, $selectacc);

        //     if (mysqli_num_rows($resulted) > 0) {
        //         while($row = mysqli_fetch_assoc($resulted)) {
        //             echo $row["login"] . "<br>". $row["pass"];
        //         }
        //     }
        if(isset($_POST["newpass"])){
            $newpass = $_POST["newpass"];
            $logged = $_SESSION['user'];

            function szyfruj_haslo($newpass){
                return md5($newpass);
            }
            $noweszyfrowane = szyfruj_haslo($newpass);

        $newaccount = "UPDATE users SET pass='$noweszyfrowane' WHERE login = '$logged'";
        if (mysqli_query($conn, $newaccount)) {
            echo "updated";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }
        }
    ?>
</body>
</html>