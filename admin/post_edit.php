<!DOCTYPE html>
<html>
<head>
<script src="../tinymce/tinymce.min.js" ></script>
<script>
tinymce.init({
    mode: 'textareas'
    
   // selector: '#article' 
  });
</script>

<style>
table, th, td {
  border: 1px solid black;
  width:100%
}
</style>
</head>
<body>
<?php 

/**
 * Laden des Ausgewählten Beitrags in die Textboxen und möglichkeit der Bearbeitung der Texte sowie Löschung einzelner Bilder
 * @author Max Stötzner
 */
error_reporting(E_ALL);
include ("header.php");

require_once '../db/db.php';
require_once 'upload.php';


session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

?>
<?php
$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];
 
  }


/**
 * BILD LÖSCHEN
 */
if(isset($_GET['?P_ID'])){
 $loaded_pic = $_GET['?P_ID'];
  delete_pic($loaded_pic,$db);
}  

/**
 * BILD LÖSCHEN ENDE
 */

 


if(empty($_GET['b_id'])){
  die("Es wurde kein Beitrag angegeben der gelöscht werden soll!");
}
else{
  $B_ID = $_GET['b_id'];
  if($B_ID > $sql_erg) die("Beitrag existiert nicht");
}

/**
  * TEXTE AKTUALISIEREN
  */

if(isset($_GET['?UPDATE'])){
  $headline_update = $_POST['head'];
  $preview_update = $_POST['preview'];
  $text_update = $_POST['article'];

  update_headline($headline_update,$db,$B_ID);
  update_preview($preview_update,$db,$B_ID);
  update_text($text_update,$db,$B_ID);
  p_upload($B_ID,$_FILES['fileToUpload']['name'],$_FILES['fileToUpload']['tmp_name'],$db);
}

   /**
  * TEXTE AKTUALISIEREN ENDE
  */

  /**
   * Beitrag laden
   */
$sql = $db->prepare("SELECT B_ID, Kategorie_ID, Text, Headline, Preview FROM beitrag where B_ID = ?");
$sql->execute(array($B_ID)) or die("Beitrag laden fehlgeschlagen");

while($row = $sql->fetch()){
    $headline = $row['Headline'];
    $preview = $row['Preview'];
    $text = $row['Text'];
}
$redirection = '"post_edit.php?b_id='.$B_ID.'&?UPDATE=1"';
?>

<form action= <?php echo $redirection ?> method="post" enctype="multipart/form-data"> <!-- article.php -->
<p>Überschrift </p>
<br>
<textarea id="head" NAME="head"> <?php echo $headline ?></textarea>
<br>
<p>Vorschautext</p>
<br>
<textarea id="preview" Name="preview" > <?php echo $preview ?></textarea>
<br>
<p>Beitragstext </p>
<br>
<textarea id="article" NAME="article" ><?php echo $text ?> </textarea>  <!-- Get Text aus Beitrag importieren-->
<br>

<p> Bilder einfügen: </p>
<!--<input type="file" name="fileToUpload" id="fileToUpload"> -->
<input name="fileToUpload[]" type="file" multiple="multiple" />

<INPUT TYPE="submit" id="submit" NAME="submit" VALUE="submit">  <!-- onclick="update_text(article.value)" -->
</form>

<p>Bilder löschen:
<br>

<?php
/**
 * Bilder aus BilderDB Laden
 * 
 */

$sql = $db->prepare("SELECT p_name, P_ID from pictures WHERE B_ID = ?");
$sql->execute(array($B_ID)) or die("Fehler beim Auslesen der Datenbank");
echo '<table>';
while($row = $sql->fetch()){
  $pic = $row['p_name'];
  $P_ID = $row['P_ID'];
  echo '<tr>';
  echo '<th> <a href="../uploads/'.$pic.'">'.$pic.'</th>';

  $redirection = '"post_edit.php?b_id='.$B_ID.'&?P_ID='.$P_ID.'"';

echo '<form action='.$redirection.'method="post" enctype="multipart/form-data">';
echo '<th> <input type="submit" value="Löschen"/> </th>'; 
echo '</form>';
  
  echo '<tr>';
  

}
echo '<table>';

include ("footer.php")
?>

<?php
/**
 * Update des Hauptbeitrags ausführen
 * @param text Eingegebener Text
 * @param db Datenbank des Beitrags der aktualisiert werden soll
 * @param B_ID Beitrags ID des Beitrags der aktualisiert werden soll
 */
function update_text($text,$db,$B_ID){
  $sql = $db->prepare("UPDATE beitrag SET Text = ? WHERE B_ID = ?");
  $sql->execute(array($text, $B_ID)) or die("<script> alert('Text aktualisierten fehlgeschlagen') </script>");
  echo "<script> alert('Text aktualisierung erfolgreich') </script>";
}
/**
 * Update der Überschrift ausführen
 * @param headline Eingegebener Text
 * @param db Datenbank des Beitrags der aktualisiert werden soll
 * @param B_ID Beitrags ID des Beitrags der aktualisiert werden soll
 */
function update_headline($headline,$db,$B_ID){
  $sql = $db->prepare("UPDATE beitrag SET Headline = ? WHERE B_ID = ?");
  $sql->execute(array($headline, $B_ID)) or die("<script> alert('Überschrift aktualisierten fehlgeschlagen') </script>");
  echo "<script> alert('Überschrift aktualisierung erfolgreich') </script>";
}
/**
 * Update der Vorschau ausführen
 * @param preview Eingegebener Text
 * @param db Datenbank des Beitrags der aktualisiert werden soll
 * @param B_ID Beitrags ID des Beitrags der aktualisiert werden soll
 */
function update_preview($preview,$db,$B_ID){
  $sql = $db->prepare("UPDATE beitrag SET Preview = ? WHERE B_ID = ?");
  $sql->execute(array($preview, $B_ID)) or die("<script> alert('Vorschau aktualisierten fehlgeschlagen') </script>");
  echo "<script> alert('Vorschau aktualisierung erfolgreich') </script>";
}
/**
 * Einzelnes ausgewähltes Bild löschen
 * @param picture Picture ID des Bildes welches gelöscht werden soll
 * @param db Datenbank in der die Picture ID steht
 */
function delete_pic($picture, $db){
  $sql = $db->prepare("SELECT p_name FROM pictures WHERE P_ID = ?");
  $sql->execute(array($_GET['?P_ID'])) or die("<script> alert('Bild Löschen Fehlgeschlagen') </script>");
  while($row = $sql->fetch()){
    $p_name = $row['p_name'];
    $file_pic = '../uploads/'.$p_name;
    if(file_exists($file_pic)){
      unlink($file_pic);
    }
   }
  
  $sql = $db->prepare("DELETE FROM pictures WHERE P_ID = ?");
  $sql->execute(array($_GET['?P_ID'])) or die("<script> alert('Bild Löschen Fehlgeschlagen') </script>");
  
  
  echo "<script> alert('Bild Löschen erfolgreich') </script>";
}
/**
 * Ausgewählte Bilder dem Beitrag hinzufügen
 * @param B_ID Beitrags ID welcher Beitrag das Bild bekommen soll
 * @param file Datei die hochgeladen werden soll
 * @param file_tmp Datei die hochgeladen werden soll
 * @param db Datenbank in dem Bildverweis eingetragen werden soll
 */
function p_upload($B_ID,$file,$file_tmp,$db){
  $total_pics = count($file);

  for($i=0; $i < $total_pics; $i++){
    $picture = $file[$i];
    $picture_tmp = $file_tmp[$i];
    
    try{
        $upload = new upload($picture, $picture_tmp);
        $upload->picUpload($picture, $picture_tmp);
        $sql = $db->prepare("INSERT INTO pictures (P_ID,B_ID,p_name) VALUES (NULL,?,?)");
        $sql->execute(array($B_ID, $picture)) or die("FEHLER BILDER DB EINTRAG");
        echo "Eintrag erfolgreich <br>";
        
    }
    catch(Exception $e){
        die($e->getMessage());
       
    }
   

}
}

?>



</html>
