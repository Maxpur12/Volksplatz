<?php
/**
 * Visuelle Ansicht um einen neuen Benutzer zu erstellen
 * @var error Fehler Variable
 * @var email E-Mail Adresse des neuen Benutzers
 * @var passwort Passwort des neuen Benutzers
 * @var passwort Wiederholte Eingabe des Passworts des neuen Benutzers
 * @author Max Stötzner
 */

require_once '../db/db.php';
require_once 'User.php';

session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');

}

$showFormular = true;
if(isset($_GET['register'])) {
    /**
     * Fehler Variable
     */
    $error = false;
    /**
     * E-Mail Adress des neuen Benutzers
     */
    $email = $_POST['email'];
    /**
     * Passwort des neuen Benutzers
     */
    $passwort = $_POST['passwort'];
    /**
     * Wiederholte Eingabe des Passworts des neuen Benutzers
     */
    $passwort2 = $_POST['passwort2'];
  
    /**
     * Prüfen ob Nutzerangaben korrekt sind
     */

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    $newUser = new User($email, $passwort, $passwort2);


    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error){
        $newUser->checkEmail( $db);
       
    }
   
   
    //Keine Fehler, Nutzer kann registriert werden
    if(!$error){
        $newUser->register($db);
    }
    
   
}
 
if($showFormular) {
    include ("header.php");
?>

<form action="?register=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
include ('footer.php');
} //Ende von if($showFormular)
?>
