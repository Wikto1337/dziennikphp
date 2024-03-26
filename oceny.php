<?php
session_start();
?>
<?php
if($_SESSION['upr']!='admin' && $_SESSION['upr']!='teacher'){
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>OCENY</h1>
    <?php
        include './menu.php'
    ?>
    <form action="" method="post">
        <select name="grades" id="grades">
            <option value="1">1</option>
            <option value="1+">1+</option>
            <option value="2-">2-</option>
            <option value="2">2</option>
            <option value="2+">2+</option>
            <option value="3-">3-</option>
            <option value="3">3</option>
            <option value="3+">3+</option>
            <option value="4-">4-</option>
            <option value="4">4</option>
            <option value="4+">4+</option>
            <option value="5-">5-</option>
            <option value="5">5</option>
            <option value="5+">5+</option>
            <option value="6-">6-</option>
            <option value="6">6</option>
        </select><br>
        <input type="text" name="uczen" id="uczen"><br>
        <button type="submit">wstaw</button>
    </form>

    <?php
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="project";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        $grade = $_POST["grades"];
        $uczen = $_POST["uczen"];

        $wstawocene = "INSERT INTO oceny"


    ?>
</body>
</html>