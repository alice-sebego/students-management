<?php
include_once "inc/db.php";
session_start();

if(isset($_POST['submit'])){
    if(isset($_POST['firstname']) &&
       isset($_POST['lastname']) &&
       isset($_POST['telephone']) &&
       isset($_POST['address'])){

        $firstname = htmlspecialchars(strip_tags(trim($_POST['firstname'])));
        $lastname = htmlspecialchars(strip_tags(trim($_POST['lastname'])));
        $telephone = htmlspecialchars(strip_tags(trim($_POST['telephone'])));
        $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
        
        $firstnameOk = $mysqli->real_escape_string($firstname);
        $lastnameOk = $mysqli->real_escape_string($lastname);
        $telephoneOk = $mysqli->real_escape_string($telephone);
        $addressOk = $mysqli->real_escape_string($address);
        
        $id = $_SESSION['idUser'];

        $req = "UPDATE students SET
                firstname = '$firstnameOk',
                lastname = '$lastnameOk',
                telephone = '$telephoneOk',
                address = '$addressOk'
                WHERE id = '$id'";

        $query = $mysqli->query($req);
        header("Location: list.php");
        
    } else {
        $id = $_SESSION['idUser'];
        $_SESSION['feedback_update'] = "Désolé, veuillez vérifier les champs à remplir svp";
        header("Location: update.php/?id=$id");
    }
}
?>