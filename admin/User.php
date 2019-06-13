<?php

class User{

public $error = false;
public $email;
public $passwort;
public $passwort2;

public function __construct($email, $passwort, $passwort2){
    $this->email = $email;
    $this->passwort = $passwort;
    $this->passwort2 = $passwort2;
}

function getError(){
    return $error;
}

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