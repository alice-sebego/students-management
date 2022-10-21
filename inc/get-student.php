<?php
if(isset($_GET['id'])) {

    $idUser = $_GET['id'];
    $is_valid_id = false;

    $reqGet = "SELECT * FROM students WHERE id=$idUser";
    $queryGet = $mysqli->query($reqGet);
    $nbStudent = $queryGet->num_rows;

    if($nbStudent > 0){
        $is_valid_id = true;
        $_SESSION['idUser'] = $idUser;

        while($row = $queryGet->fetch_array()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $telephone = $row['telephone'];
            $address = $row['address'];
        }
    } else {
        $feedback = "Pas de compte associé à l'utilisateur n° $idUser";
    }
}
?>