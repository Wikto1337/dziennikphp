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
<h1>ADD NEW USER</h1>
    <form action="rejestracja.php" method="POST" id="form">
        <input type="text" name="login" id="login" placeholder="login"><br>
        <input type="password" name="pass" id="pass" placeholder="password"><br>
        <select name="upr_update" id="upr_update">
            <option value="admin">admin</option>
            <option value="teacher">teacher</option>
            <option value="user">uczen</option>
        </select><br>
        <select name="class_update" id="class_update">
            <option value="null">null</option>
            <option value="1PE">1PE</option>
            <option value="1PRO">1PRO</option>
            <option value="2PE">2PE</option>
            <option value="2PRO">2PRO</option>
            <option value="2PC">2PC</option>
            <option value="3PE">3PE</option>
            <option value="3PC">3PC</option>
            <option value="3PRO">3PRO</option>
            <option value="4PC">4PC</option>
            <option value="4PE">4PE</option>
            <option value="4PRO">4PRO</option>
            <option value="5PRO">5PRO</option>
        </select><br>
        <input type="submit" value="ADD USER"><br>
    </form>
    <?php
        if($_SESSION['upr']=='admin'){
            echo "<button type='submit'>" . "<a href='admin.php'>←</a>" . "</button>";
        }
    if(isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["class_update"]) && isset($_POST["upr_update"])){
        $log=$_POST["login"];
        $pas=$_POST["pass"];
        $class = $_POST["class_update"];
        $upr = $_POST["upr_update"];


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