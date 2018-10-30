<?php
require_once 'db/db.php';

session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="admin/login.php">einloggen</a>');
}



$article = "";
if(isset($_GET['name'])){
    $article = $_GET['name'];

}
//echo $article;

$button_status = $_POST['submit'];

if($button_status){  //Wenn Button gedrückt
    $text = $_POST['article']; //Übernehme den Text aus dem Textfeld "article"
    $sql = $db->prepare("INSERT INTO beitrag (B_ID,Kategorie_ID,Text) VALUES (NULL,NULL,?)");
    $sql->execute(array($text)) or die("irgendetwas doofes ist passiert");
    echo 'Eingabe erfolgreich <br>';


    $sql_beitrag = get_B_ID($text,$db); //Beitrag ID Finden mitteld get_b_ID(); mysqli_fetch_row() wandelt mysqli_result object in Array um;
    $sql = $db->prepare("SELECT TEXT FROM beitrag WHERE B_ID = ?");
    $sql->execute(array($sql_beitrag)) or die("fehler");
    while($row = $sql->fetch()){
        $b_erg = $row['TEXT'];
    }

    echo "<p>".$b_erg."</p>";
  
}


/**
 * Funktion um die B_ID eines Beitrages in einer Datenbank herauszufinden
 * $beitrag = Text der in der Datenbank gesucht werden soll
 * $database = Datenbank die nach $beitrag durchsucht werden soll
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