<?php
session_start();
$title = "Liste des étudiants";
?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="main-content">
        <h1>Découvrez la liste des étudiants 
            <span class="sub-title">de Cook Study</span>
        </h1>
        <div class="container">
            <?php if(isset($_SESSION['auth']['firstname']) && !empty($_SESSION['auth']['firstname'])): ?>    
                <?php include_once "inc/db.php" ?>
                <table class="student-list">
                    <caption>Annuaire des étudiants</caption>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'inc/utils.php';
                    $reqGet = "SELECT * FROM students ORDER BY lastname";
                    $queryGet = $mysqli->query($reqGet);
                    $nbStudent = $queryGet->num_rows;
                    if($nbStudent > 0){
                        while($row = $queryGet->fetch_array()){
                            $pict = $row['picture'];
                            $profile = strlen($pict) > 0 ? "<img src='assets/images/profile/$pict' alt=''>" : "<img src='assets/images/profile/person_default.png'/>" ;
                            $username = $row['firstname'];
                            $phoneNumber = formatPhoneNumber($row['telephone']);
                            echo "
                            <tr>
                                <td class='picture'>". $profile ."</td>
                                <td class='firstname'>". $username ."</td>
                                <td class='lastname'>". strtoupper($row['lastname']) ."</td>
                                <td class='address'>". $row['address'] ."</td>
                                <td class='phone'>". $phoneNumber ."</td>
                                <td class='email'><a href='mailto:". $row['email'] ."'>". $row['email'] ."</a></td>
                                <td class='update'><a href='update.php?id=". $row['id'] ."' title='Modifier ". $username ."'><img src='./assets/images/edit.svg'></a></td>
                                <td class='delete'><a href='delete.php?id=". $row['id'] ."' title='Supprimer ". $username ."'><img src='./assets/images/delete.svg'></a></td>
                            </tr>      
                            ";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-logged">Vous devez vous connecter pour accéder à la liste <br>
                    <a href="login.php" title="connectez-vous">Connectez-vous</a>
                </p>
            <?php endif; ?>    
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>