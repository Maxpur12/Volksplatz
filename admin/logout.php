<?php
/**
 * Logout aus dem Back-End Bereich und Weiterleitung zur Login Seite
 * @author Max Stötzner
 */
require_once '../db/db.php';
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

/**
 * In einer ersten Version wurde der Logout über einen Button realisiert
 * Jetzt ist es ein Link. Möglichkeit eines Logout über einen Button wird dennoch offen gehalten.
 */
$button_logout = $_POST['logout'];
if($button_logout){
 /**
  * Session beenden 
  */   
unset($_SESSION['userid']);
session_destroy(); //Löscht alle in einer Session registrierten Daten
session_write_close(); //Beendet die Session
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