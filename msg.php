<?php
    session_start();
?>
<?php
if($_SESSION['upr']!='user'){
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>msg</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

include "./menu.php";

?>
    <form action="msg.php" method="post">
        <?php
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="project";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        if(!$conn){
            die (mysqli_connect_error() . "error");
        }

        $odczytnauczycieli = "SELECT * FROM users WHERE upr='teacher' || upr='admin'";
        $result = mysqli_query($conn, $odczytnauczycieli);    

        if (mysqli_num_rows($result) > 0) {
            echo "<select name='teacher' id='teacher'>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option>" . $row["login"] . "</option>";
            }; echo "</select>";
        };
        ?><br>
        <input type="text" placeholder="type a text" name="msg" id="msg"><br>
        <button type="submit">send</button>
    </form> 
    <?php 
    $host="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="project";

    $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

    if(!$conn){
        die (mysqli_connect_error() . "error");
    };
    if(isset($_POST["msg"]) && isset($_POST["teacher"])){
    $msg = $_POST["msg"];
    $odbiorca = $_POST["teacher"];
    $dostawca = $_SESSION['user'];


    $sendmsg = "INSERT INTO msg (dostawca, odbiorca, messages, odczytana) VALUES ('$dostawca', '$odbiorca','$msg', 'nie')";

    if (mysqli_query($conn, $sendmsg)) {
        echo "msg sended";
      }
    }
    
    ?>
</body>
</html>