<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>REGISTER</h1>
    <form action="rejestracja.php" method="POST" id="form">
        <input type="text" name="login" id="login" placeholder="login"><br>
        <input type="password" name="pass" id="pass" placeholder="password"><br>
        <input type="submit" value="ADD USER"><br>
        <p>if u have an account just <a href="login.php">login</a></p>
    </form>
    <?php
        if($_SESSION['upr']!='admin' || $_SESSION['upr']!='teacher' || $_SESSION['upr']=='admin'){
            echo "<button type='submit'>" . "<a href='login.php'>←</a>" . "</button>";
        }
    ?>
    <?php
        if($_SESSION['upr']=='admin'){
            echo "<button type='submit'>" . "<a href='admin.php'>←</a>" . "</button>";
        }
    ?>
    <?php
    if(isset($_POST["login"]) && isset($_POST["pass"])){
        $log=$_POST["login"];
        $pas=$_POST["pass"];


        function szyfruj_haslo($pas){
            return md5($pas);
        }
        $zaszyfrowane=szyfruj_haslo($pas);
        
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="project";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        if(!$conn){
            die (mysqli_connect_error() . "error");
        }

        

        $sql="INSERT INTO users(login,pass,upr) VALUES ('$log','$zaszyfrowane','user')";
        if(mysqli_query($conn,$sql)){
            echo "user added";
        } else echo "error";
    }
    ?>
</body>
</html>