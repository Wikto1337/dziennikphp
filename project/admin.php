<?php
session_start();
?>

<?php
if($_SESSION['upr']!='admin'){
    header('Location: ./admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <h1>ADMIN</h1>

    <?php 
        include './menu.php';
    ?>

    <form action="admin.php" method="post">
        <label for="changeupr">komu chcesz zmienic uprawnienia?</label><br>
        <select name="uprawnienia" id="uprawnienia">
            <option value="admin">admin</option>
            <option value="teacher">teacher</option>
            <option value="user">user</option>
        </select><br>
        <input type="text" name="changeupr" id="changeupr" placeholder="type a login"><br>
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

        $odczytadmin = "SELECT * FROM users";
        $result = mysqli_query($conn, $odczytadmin);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row["login"];
            }; 
        };

    if(isset($_POST["changeupr"]) && isset($_POST["uprawnienia"])){    
        $changed = $_POST["uprawnienia"];

        $pickid = $_POST["changeupr"];


        $zmienupr = "UPDATE users SET upr='$changed' WHERE login='$pickid'";

    if(isset($_POST["changeupr"]) && isset($_POST["uprawnienia"])){
        if (mysqli_query($conn, $zmienupr)) {
            echo "changed";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }
        }
    }
    ?>
        <form action="admin.php" method="post">
            <label for="changeupr">kogo chcesz usunac</label><br>
            <input type="text" name="usun" id="usun" placeholder="type a login"><br>
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



        $deletepick = $_POST["usun"];

        $delete = "DELETE FROM users WHERE login='$deletepick'";

        if (mysqli_query($conn, $delete)) {
          echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
}
    mysqli_close($conn);
        ?>
</body>
</html>