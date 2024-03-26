<?php
session_start();

if($_SESSION['upr']!='admin'){
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
<h1>USTAW KLASE</h1>
    <?php
        include './menu.php'
    ?>

    <form action="" method="get">
        <input type="text" name="loginclass" id="loginclass">
        <select name="grades" id="grades">
            <option value="1PRO">1PRO</option>
            <option value="1PE">1PE</option>
            <option value="2PE">2PE</option>
            <option value="2PRO">2PRO</option>
            <option value="2PBU">2PBU</option>
            <option value="3PE">3PE</option>
            <option value="3PRO">3PRO</option>
            <option value="3PBU">3PBU</option>
            <option value="4PRB">4PRB</option>
            <option value="4PPR">4PPR</option>
            <option value="4PE">4PE</option>
        </select><br>
        <button type="submit">set class</button>
    </form>
</body>
</html>