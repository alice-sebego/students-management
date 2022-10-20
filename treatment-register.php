<?php
session_start(); 
include_once "inc/db.php";

 if( isset($_POST['submit']) &&
    isset($_POST['lastname']) && 
    isset($_POST['firstname']) &&
    isset($_POST['email']) &&
    isset($_POST['address']) &&
    isset($_POST['password']) &&
    isset($_POST['telephone']) ){

    $firstname = htmlspecialchars(strip_tags(trim($_POST['firstname'])));
    $lastname = htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
    $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
    $telephone = htmlspecialchars(strip_tags(trim($_POST['telephone'])));

    // Preparation of data

    $firstnameOk = $mysqli->real_escape_string($firstname);
    $lastnameOk = $mysqli->real_escape_string($lastname);
    $emailOk = $mysqli->real_escape_string($email);
    $passwordOk = $mysqli->real_escape_string(hash('whirlpool', $password));
    $addressOk = $mysqli->real_escape_string($address);
    $telephoneOk = $mysqli->real_escape_string($telephone);

    $req = "SELECT * FROM students WHERE email = '$emailOk'";
    $query = $mysqli->query($req);
    $nb = $query->num_rows;

    if($nb < 1){
        $req = "INSERT INTO students 
                VALUES(NULL, '$firstnameOk', '$lastnameOk', '$emailOk', '$passwordOk', '$telephoneOk', '$addressOk')";
        $query = $mysqli->query($req);
        $_SESSION['feedback-register'] = "Vous êtes bien inscrit(e)";
        header("Location: login.php");
    } else {
        $_SESSION['feedback-register'] = "Un compte est déjà associé à cet email";
        header("Location: register.php");
    }
} else {
    $_SESSION['feedback-register'] = "Oups ! Il manque des éléments dans le formulaire";
    header("Location: register.php");
}
?>