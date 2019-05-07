<?php
require_once '../db/db.php';
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
$button_logout = $_POST['logout'];
if($button_logout){
    
unset($_SESSION['userid']);
session_destroy();
session_write_close();
header('Location: login.php');

}
else{
    unset($_SESSION['userid']);
session_destroy();
session_write_close();
header('Location: login.php');
}
exit;
?>