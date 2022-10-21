<?php
include_once "inc/db.php";
session_start();

if(isset($_POST['submit']) &&
   isset($_POST['email']) &&
   isset($_POST['password'])) {

    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password']))); 

    $loginOK = $mysqli->real_escape_string($email);
    $passOK = $mysqli->real_escape_string(hash('whirlpool', $password));

    $req = "SELECT * FROM students WHERE email = '$loginOK' AND password = '$passOK' ";

    $query = $mysqli->query($req);
    $nb = $query->num_rows;

    if (!is_null($query)) {
      while($row = $query->fetch_array()) {
        $_SESSION['auth']['id'] = $row['id'];
        $_SESSION['auth']['firstname'] = $row['firstname'];
        $_SESSION['auth']['lastname'] = $row['lastname'];
      }
    }
    if ($nb > 0) {
      $_SESSION['feedback-login'] = "";
      $_SESSION['feedback-register'] = "";
      header("Location: index.php");
    } else {
      $_SESSION['feedback-login'] = "Pas de compte associé à cet email";
      header("Location: login.php");
    }
   
} else {
    $_SESSION['feedback-login'] = "le formulaire est mal rempli";
    header("Location: login.php");
}
?>