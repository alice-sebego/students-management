<?php
session_start();
$title = "Gestion des étudiants";
 ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="main-content">
        <h1>Bienvenue sur la plateforme 
            <span class="sub-title">Gestion des Etudiants</span>
        </h1>
        <div class="presentation">
            <div class="description">
                <h2>Découvrez la liste des étudiants</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quis reprehenderit numquam officia distinctio, repudiandae fugiat, illo recusandae nam, labore quae reiciendis unde eum libero soluta eaque suscipit dolorem? Amet!</p>
                <a href="list.php" class="list-acces">Accèder à la liste</a>
            </div>
            <div class="illustration">
                <img src="https://images.pexels.com/photos/261651/pexels-photo-261651.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Student Illustration">
            </div>
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>