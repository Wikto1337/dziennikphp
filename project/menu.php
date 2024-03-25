<?php
echo "logged user: ";
echo $_SESSION['user'];

?>
<ul>

<?php 
    if($_SESSION['upr']=='teacher'){
        echo "<div> <a href='/project/oceny.php'>OCENY</a> </div>";
    }
    
?>

<?php
if($_SESSION['upr']=='admin'){
    echo "<div> <a href='/project/admin.php'>ADMIN</a> </div>";
    echo "<div> <a href='/project/rejestracja.php'>ADD NEW USER</a> </div>";
    echo "<div> <a href='/project/oceny.php'>OCENY</a> </div>";
}
?>


<?php
if($_SESSION['zalogowano']){
    echo "<div> <a href='/project/logout.php'>LOG OUT</a> </div>";
} else {
    echo "<div> <a href='/project/login.php'>LOGIN</a> </div>";
}
?>


</ul>