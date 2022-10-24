<?php
session_start(); 
include_once "inc/db.php";

 if(isset($_POST['submit']) &&
    isset($_POST['lastname']) && 
    isset($_POST['firstname']) &&
    isset($_POST['email']) &&
    isset($_POST['address']) &&
    isset($_POST['password']) &&
    isset($_POST['telephone']) &&
    isset($_FILES['picture']) ){
    
    // Image profile treatment    
    $target_dir = "assets/images/profile/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //Check if image file is a actual image or fake image
  
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if (!empty($check)) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["picture"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    //   Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }    

    $firstname = htmlspecialchars(strip_tags(trim($_POST['firstname'])));
    $lastname = htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
    $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
    $telephone = htmlspecialchars(strip_tags(trim($_POST['telephone'])));
    $picture = $_FILES["picture"]["name"];

    // Preparation of data

    $firstnameOk = $mysqli->real_escape_string($firstname);
    $lastnameOk = $mysqli->real_escape_string($lastname);
    $emailOk = $mysqli->real_escape_string($email);
    $passwordOk = $mysqli->real_escape_string(hash('whirlpool', $password));
    $addressOk = $mysqli->real_escape_string($address);
    $telephoneOk = $mysqli->real_escape_string($telephone);
    $pictureOk = $mysqli->real_escape_string($picture);

    $req = "SELECT * FROM students WHERE email = '$emailOk'";
    $query = $mysqli->query($req);
    $nb = $query->num_rows;

    if($nb < 1){
        $req = "INSERT INTO students 
                VALUES(NULL, '$firstnameOk', '$lastnameOk', '$emailOk', '$passwordOk', '$telephoneOk', '$addressOk', '$pictureOk')";
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