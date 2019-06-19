<?php
/**
 * Login zum Back-End Bereich
 * @author Max Stötzner
 * 
 */

require_once '../db/db.php';
session_start();

if(isset($_GET['login'])){
    /**
     * Eingegebene E-Mail-Adresse des Benutzers
     */
    $email = $_POST['email'];
    /**
     * Eingegebenes Passwort des Benutzers
     */
    $passwort = $_POST['passwort'];
    
    /**
     * Datenbankabfrage nach vorhandensein der eingegebenen E-Mail Adresse
     */
    $sql = $db->prepare("SELECT * FROM users WHERE email = :email");
    $erg = $sql->execute(array('email' => $email));
    $user = $sql->fetch();

    if($user !== false && password_verify($passwort, $user['passwort'])){
        $_SESSION['userid'] = $user['id'];
        header("HTTP/1.1 301 Moved Permanently");
        header('Location:index.php');
        die('Login erfolgreich! Weiter zu <a href="index.php"> intern');
    } else{
        $errorMessage = "E-Mail oder Passwort war ungültig <br>";
    }
}



?>

<?php
if(isset($errorMessage)){
    echo $errorMessage;
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">  <!--Icon ersetzen -->

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="?login=1" method="post">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> <!--Logo -->
      <h1 class="h3 mb-3 font-weight-normal">Bitte melden Sie sich an!</h1>
      <label for="inputEmail" class="sr-only">E-Mail Adresse</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-Mail Adresse" required autofocus>
      <label for="inputPassword" class="sr-only">Passwort</label>
      <input type="password" name="passwort" id="inputPassword" class="form-control" placeholder="Passwort" required>
     <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>
