<?php
include_once "inc/db.php";
session_start();

if(isset($_POST['delete'])){

    $idStudent = $_SESSION['idUser'];
    $IdToDeleteOk = $mysqli->real_escape_string($idStudent);
    $req = "DELETE FROM students WHERE id = '$IdToDeleteOk'";
    $query = $mysqli->query($req);
    header("Location: list.php");
}
?>