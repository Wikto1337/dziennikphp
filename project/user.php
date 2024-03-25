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

        ?>
</body>
</html>