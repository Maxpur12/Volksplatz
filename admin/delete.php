<?php
require_once "../db/db.php";
session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');

}


$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];
 
  }


if(empty($_GET['b_id'])){
  die("Es wurde kein Beitrag angegeben der gelöscht werden soll!<br>");
}
else{
  $B_ID = $_GET['b_id'];
  $P_B_ID = $B_ID;
  if($B_ID > $sql_erg || $B_ID < "0")  die("Beitrag existiert nicht<br>");
}




/**
 * Alle Bilder des Beitrags löschen
 */
$sql = $db->prepare("SELECT p_name FROM pictures WHERE B_ID = ?");
$sql->execute(array($P_B_ID)) or die("Fehler Abfrage Datenbank<br>");
  while($row = $sql->fetch()){
    $p_name = $row['p_name'];
    echo $p_name;
    $file_pic = '../uploads/'.$p_name;
    if(file_exists($file_pic)){
     

      unlink($file_pic);
      
    }
    $sql = $db->prepare("DELETE FROM pictures WHERE B_ID = ?");
    $sql->execute(array($P_B_ID)) or die("<script> alert('Bild Löschen Fehlgeschlagen') </script>");

  }




/**
 * Prüfen ob Bilder bei darauffolgenden Beiträgen vorhanden sind
 * Anschließend Bilder aktualisieren
 */

for($i = $B_ID + 1; $i<=$sql_erg; $i++){

  $sql = $db->prepare("SELECT * FROM pictures WHERE B_ID = ?");
  $sql->execute(array($i)) or die("Fehler Abfrage Datenbank<br>");
 
  if($sql->fetch()==true){
    echo "Bild existiert<br>";

    $sql = $db->prepare("UPDATE pictures SET B_ID = ? WHERE B_ID = ?");
    $sql->execute(array($i - 1, $i)) or die("Bilder ID aktualisieren Fehlgeschlagen<br>");
    echo "Bilder Aktualisieren erfolgreich<br>";

  }
  else {
   echo "Bild existiert nicht<br>";
  }
}
/**
 * Beitrag löschen
 */

$sql = $db->prepare("DELETE FROM beitrag WHERE B_ID = ?");
$sql->execute(array($B_ID)) or die("Beitrag Löschen Fehlgeschlagen<br>");
echo "Löschen erfolgreich<br>";

/**
 * Nachfolgende Beiträge hinlänglich der BeitragsID aktualisieren
 */
for($i = $B_ID + 1; $i<=$sql_erg; $i++){
    $sql = $db->prepare("UPDATE beitrag SET B_ID = ? WHERE B_ID = ?");
    $sql->execute(array($i-1, $i)) or die(" Fehler UPDATE<br>");

}
echo "Datenbank wurde Aktualisiert<br>";



?>