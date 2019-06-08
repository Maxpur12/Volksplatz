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
</head>
<body>
<?php 
error_reporting(E_ALL);
require_once '../db/db.php';
/*
session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="admin/login.php">einloggen</a>');
}
*/
?>
<?php
$sql = $db->prepare("SELECT MAX(B_ID) from beitrag");
$sql->execute() or die("fehler");
    
    
 while($row = $sql->fetch()){
   $sql_erg = $row['MAX(B_ID)'];
 
  }


if(empty($_GET['b_id'])){
  die("Es wurde kein Beitrag angegeben der gelöscht werden soll!");
}
else{
  $B_ID = $_GET['b_id'];
  if($B_ID > $sql_erg) die("Beitrag existiert nicht");
}

$sql = $db->prepare("SELECT B_ID, Kategorie_ID, Text, Headline, Preview FROM beitrag where B_ID = ?");
$sql->execute(array($B_ID)) or die("Beitrag laden fehlgeschlagen");

while($row = $sql->fetch()){
    $headline = $row['Headline'];
    $preview = $row['Preview'];
    $text = $row['Text'];
}

?>

<form action="article.php" method="post" enctype="multipart/form-data"> <!-- article.php -->
<p>Überschrift (limitiert auf 100 Zeichen) </p>
<br>
<textarea id="head" NAME="head"> <?php echo $headline ?></textarea>
<br>
<p>Vorschautext (limitiert auf 240 Zeichen)</p>
<br>
<textarea id="preview" Name="preview" > <?php echo $preview ?></textarea>
<br>
<p>Text </p>
<br>
<textarea id="article" NAME="article" ><?php echo $text ?> </textarea>  <!-- Get Text aus Beitrag importieren-->
<br>
<p> Bilder einfügen: </p>
<!--<input type="file" name="fileToUpload" id="fileToUpload"> -->
<input name="fileToUpload[]" type="file" multiple="multiple" />

<INPUT TYPE="submit" id="submit" NAME="submit" VALUE="submit">  <!-- onclick="update_text(article.value)" -->
</form>

</html>
