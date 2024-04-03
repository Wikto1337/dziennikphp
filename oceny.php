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
    <title>oceny</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>OCENY</h1>
    <?php
        include './menu.php'
    ?>
    <form action="oceny.php" method="post">
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
        <?php
        $host="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="project";

        $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        if(!$conn){
            die (mysqli_connect_error() . "error");
        }

        $odczytadmin = "SELECT * FROM users WHERE upr='user'";
        $result = mysqli_query($conn, $odczytadmin);    

        if (mysqli_num_rows($result) > 0) {
            echo "<select name='uczen' id='uczen'>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option>" . $row["login"] . "</option>";
            }; echo "</select>";
        };
        ?><br>
        <input type="text" name="opis" id="opis" placeholder="type an opis"><br>
        <input type="text" name="przedmiot" id="przedmiot" placeholder="type a przedmiot"><br>
        <button type="submit">wstaw</button>
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
    if(isset($_POST["uczen"]) && isset($_POST["grades"]) && isset($_POST["opis"]) && isset($_POST["przedmiot"])){ 
    $uczen = $_POST["uczen"];
    $grade = $_POST["grades"];
    $opis = $_POST["opis"];
    $przedmiot = $_POST["przedmiot"];

    $wstawocene = "INSERT INTO oceny(login, ocena, opis, przedmiot, nauczyciel) VALUES ('$uczen', '$grade', '$opis', '$przedmiot', '$_SESSION[user]')";
    
    if (mysqli_query($conn, $wstawocene)) {
        echo "new grade added";
      } else {
        echo "Error: " . $wstawocene . "<br>" . mysqli_error($conn);
      }
    }
    ?>
</body>
</html>