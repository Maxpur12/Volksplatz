<?php
require_once '../db/db.php';
require_once 'upload.php';

session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="admin/login.php">einloggen</a>');
}



$article = "";
$head = "";
$prev = "";
if(isset($_GET['name'])){
    $article = $_GET['name'];

}
//echo $article;

$button_status = $_POST['submit'];
if($button_status){  //Wenn Button gedrückt
    $text = utf8_encode($_POST['article']); //Übernehme den Text aus dem Textfeld "article"
    $headline = utf8_encode($_POST['head']);
    $preview = utf8_encode($_POST['preview']);
    //Anzahl der hochzuladenen Bilder
   $total_pics = count($_FILES['fileToUpload']['name']);

     //Todo: Ergänzen um $headline
    //Todo: Ergänzen um $preview 
    
    //Todo: Schleife Anfang?
    $sql = $db->prepare("INSERT INTO beitrag (B_ID,Kategorie_ID,Text,Headline,Preview) VALUES (NULL,NULL,?,?,?)");
    $sql->execute(array($text,$headline,$preview)) or die("irgendetwas doofes ist passiert");
    echo 'Eingabe erfolgreich <br>';
    //Todo: Schleife ende

    $id = $db->lastInsertID();
   //echo $id;
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
       
        //SQL Bildeintrag
        //ToDo: Bild Tabelle anlegen
    }
    sleep(3);
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:index.php');
   
    
    /*
    $sql_beitrag = get_B_ID($text,$db); //Beitrag ID Finden mitteld get_b_ID(); mysqli_fetch_row() wandelt mysqli_result object in Array um;
    $sql = $db->prepare("SELECT Headline FROM beitrag WHERE B_ID = ?");
    $sql->execute(array($sql_beitrag)) or die("fehler");
    while($row = $sql->fetch()){
        $b_erg = $row['Headline'];
    }

    echo "<p>".$b_erg."</p>";
  */
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