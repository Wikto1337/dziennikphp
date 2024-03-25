<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>LOGIN</h1>
    <form action="login.php" method="POST" id="form">
        <input type="text" name="login" id="login" placeholder="login"><br>
        <input type="password" name="pass" id="pass" placeholder="password"><br>
        <input type="submit" value="LOGIN" id="guziklog"><br>
        <p>if you dont have an account already <a href="rejestracja.php">sign in</a></p>
    </form>
    
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

        

        $sql="SELECT * FROM users WHERE login='$log' AND pass='$zaszyfrowane'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $_SESSION['zalogowano']=true;

            $row = mysqli_fetch_assoc($result);
            
            $_SESSION['user'] = $row['login'];
            
            $_SESSION['upr'] = $row['upr'];
            
            header('Location: ./project/admin.php');

            header('Location: ./oceny.php');

            header('Location: ./user.php');

        } else {
            $_SESSION['zalogowano']=false;
            $_SESSION['user'] = "";
            
            $_SESSION['upr'] = "";
            echo "error";
    }
}
    
    ?>
</body>
</html>