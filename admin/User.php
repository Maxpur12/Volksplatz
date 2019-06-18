<?php
/**
 * Die Klasse erstellt den Nutzer und trägt diesen in die Datenbank ein.
 * @author Max Stötzner
 * @var error Fehlervariable, schaltet um wenn eine eine Bedingung nicht erfüllt wurde
 * @var email E-Mail Adresse des Nutzers 
 * @var passwort Passwort des Nutzers
 * @var passwort2 Bestätigung des Passwort des Nutzers
 */
class User{
/**
 * Fehlervariable, schaltet um wenn eine eine Bedingung nicht erfüllt wurde
 */
private $error = false;
/**
 * E-Mail Adresse des Nutzers
 */
private$email;
/**
 * Passwort des Nutzers
 */
private $passwort;
/**Bestätigung des Passwort des Nutzers */
private $passwort2;


/**
 * Konstruktor der Klasse User
 * @param email E-Mail Adresse des Nutzers
 * @param passwort Passwort des Nutzers
 * @param passwort2 Bestätigung des Passworts des Nutzers
 */
public function __construct($email, $passwort, $passwort2){
    $this->email = $email;
    $this->passwort = $passwort;
    $this->passwort2 = $passwort2;
}

function getError(){
    return $error;
}

/**
 * Überprüft ob die eingegbene E-Mail Adresse bereits in der Datenbank vorhanden ist
 * @param db Datenbank aus der Abgefragt werden soll
 */
function checkEmail( $db){
    $statement = $db->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $this->email));
    $user = $statement->fetch();
    
    if($user !== false) {
        echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
        $error = true;
        return $error;
    }    
}

/**
 * Der User wird mit E-Mail Adresse und Passwort in die Datenbank eingetragen
 * @param db Datenbank in die Eingetragen werden soll
 */
function register( $db){
    $passwort_hash = password_hash($this->passwort, PASSWORD_DEFAULT);
        
        $statement = $db->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $this->email, 'passwort' => $passwort_hash));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}



?>