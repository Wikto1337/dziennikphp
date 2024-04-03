<?php
echo "logged user: ";
echo $_SESSION['user'];

?>

<?php 
    if($_SESSION['upr']=='teacher'){
        echo "<a href='/dziennikphp/oceny.php'>OCENY</a>";
        echo "<a href='/dziennikphp/logout.php'>LOG OUT</a>";
    }
    
?>

<?php
if($_SESSION['upr']=='admin'){

    echo "<a href='/dziennikphp/admin.php'>ADMIN</a>";
    echo "<a href='/dziennikphp/rejestracja.php'>ADD NEW USER</a>";
    echo "<a href='/dziennikphp/oceny.php'>OCENY</a>";
    echo "<a href='/dziennikphp/logout.php'>LOG OUT</a>";
}
?>
