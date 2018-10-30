<?php 
error_reporting(E_ALL); //E_ALL | 0 Fehlermeldungen ausschalten
$db_ip_adress = "localhost";    
$db_user = "root";
$db_password = "";
$database = "volksplatz";
$db;

try{
$db = new PDO('mysql:host='.$db_ip_adress.';dbname='.$database , $db_user, $db_password); // Verbindung zur Datenbank: IP Adresse, User, Passwort, Datenbank

} catch(PDOException $e){
    
        
   print $e->getMessage();
    die("<p>O NEIM, Schmusi wollte doch nur helfen, aber leider hat er die Seite kaputt gemacht. <br>
    Schnell dem Schmusi 1 Blussi geben damit er den Fehler findet! </p>");

}

function getDB(){
    return $db;
}

?>