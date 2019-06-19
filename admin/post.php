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
/**
 * Eingabemöglichkeit zur Eingabe eines neuen Beitrages
 * @author Max Stötzner
 */
error_reporting(E_ALL);
require_once '../db/db.php';

session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>



<form action="article.php" method="post" enctype="multipart/form-data"> <!-- article.php -->
<p>Überschrift </p>
<br>
<textarea id="head" NAME="head"> </textarea>
<br>
<p>Vorschautext</p>
<br>
<textarea id="preview" Name="preview"> </textarea>
<br>
<p>Beitragstext </p>
<br>
<textarea id="article" NAME="article"> </textarea>  <!-- Get Text aus Beitrag importieren-->
<br>
<p> Bilder einfügen: </p>
<!--<input type="file" name="fileToUpload" id="fileToUpload"> -->
<input name="fileToUpload[]" type="file" multiple="multiple" />

<INPUT TYPE="submit" id="submit" NAME="submit" VALUE="Senden">  <!-- onclick="update_text(article.value)" -->
</form>

</html>
