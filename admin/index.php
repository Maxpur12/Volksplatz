<!DOCTYPE html>
<html>
<head>
</head>
<body> 
<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="admin/login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
header("HTTP/1.1 301 Moved Permanently");
header('Location:post.php')
?>
</body>
</html>

