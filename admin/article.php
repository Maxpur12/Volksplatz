<?php
/**
 * Eintragen des Beitrages in die Datenbank
 * @author Max Stötzner
 * @var text Hauptbeitrag der vom Nutzer eingegeben wird
 * @var headline Überschrift die vom Nutzer eingegeben wird
 * @var preview Vorschautext die vom Nutzer eingegeben wird
 * @var total_pics Anzahl der Hochzuladenen Bilder
 * @var picture Name des Bild welches auf den Server geladen werden soll
 * @var picture_tmp Name des Bild welches auf den Server geladen werden soll
 * @var upload Bild welches Hochgeladen wird
 */

require_once '../db/db.php';
require_once 'upload.php';

session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}



$article = "";
$head = "";
$prev = "";
if(isset($_GET['name'])){
    $article = $_GET['name'];

}
/**
 * Herausfinden der letzten Beitrags ID
 * Das Löschen eines Beitrags führt dazu, dass der neuste erstellte Beitrag
 * nicht die richtige BeitragsID durch AUTO_INCREMENT erhällt.
 * Mit dieser Funktion soll die letzte BeitragsID ermittelt werden.
 * Bsp.: Beitrag mit der ID = 5 wird gelöscht, ein neuer Beitrag erhält nicht die B_ID = 5 sondern B_ID = 6
 * 
 * @param db Datenbank aus der Inhalt geladen werden soll
 */
function getLastID($db){
    $sql = $db->prepare("SELECT COUNT(B_ID) FROM beitrag");
    $sql->execute(array()) or die("Fehler bei der Abfrage getLastID()");
    while($row = $sql->fetch()){
        $lastID = $row["COUNT(B_ID)"];
    }
    return $lastID;
}

$button_status = $_POST['submit'];
if($button_status){  //Wenn Button gedrückt
    $text = utf8_encode($_POST['article']); //Übernehme den Text aus dem Textfeld "article"
    $headline = utf8_encode($_POST['head']);
    $preview = utf8_encode($_POST['preview']);
    //Anzahl der hochzuladenen Bilder
   $total_pics = count($_FILES['fileToUpload']['name']);
   
   //Letze BeitragsID laden und um 1 erhöhen
   $lastID = getLastID($db) +1;
    $sql = $db->prepare("INSERT INTO beitrag (B_ID,Kategorie_ID,Text,Headline,Preview) VALUES (?,NULL,?,?,?)");
    $sql->execute(array($lastID,$text,$headline,$preview)) or die("irgendetwas doofes ist passiert");
    echo 'Eingabe erfolgreich <br>';
   

    $id = $db->lastInsertID();
  
    echo $total_pics;
   
    //Anzahl der Bilder noch in Variable ablegen
    for($i=0; $i < $total_pics; $i++){
        $picture = $_FILES['fileToUpload']['name'][$i];
        $picture_tmp = $_FILES['fileToUpload']['tmp_name'][$i];
        
    
      
        try{
            $upload = new upload($picture, $picture_tmp);
            $upload->picUpload($picture, $picture_tmp);
            $sql = $db->prepare("INSERT INTO pictures (P_ID,B_ID,p_name) VALUES (NULL,?,?)");
            $sql->execute(array($id, $picture));
            echo "Eintrag erfolgreich <br>";
            
        }
        catch(Exception $e){
            die($e->getMessage());
           
        }
   
    }
    sleep(3);
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:index.php');
   
  
}


/**
 * Funktion um die B_ID eines Beitrages in einer Datenbank herauszufinden
 * Wird nicht verwendet
 * @param beitrag  Text der in der Datenbank gesucht werden soll
 * @param database  Datenbank die nach $beitrag durchsucht werden soll
 */
function get_B_ID($beitrag,$database){
    $sql_abfrage = $database->prepare("SELECT B_ID FROM beitrag where TEXT = ?");
    $sql_abfrage->execute(array($beitrag)) or die("fehler funktion get_B_ID");
    while($row = $sql_abfrage->fetch()){
        $sql_erg = $row['B_ID'];
    }
    return $sql_erg;
}


?>