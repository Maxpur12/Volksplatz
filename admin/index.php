<!DOCTYPE html>
<html lang="de">

<head>

<?php
/**
 * Startseite
 * @author Max Stötzner
 */

session_start();
if(!isset($_SESSION['userid'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<?php
include ("header.php");
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Neuer Beitrag</h1>

          <?php
          include ("post.php");
          include ("footer.php");
          ?>

</html>
