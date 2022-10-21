<?php 
session_start();
if(!isset($_SESSION['auth']['firstname'])) header("Location: index.php");
$title = "Modifier";
include_once "inc/db.php";
include_once "inc/get-student.php";
?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="main-content">
        <h1>Modifier les informations d'un étudiant</h1>
        <div class="container">
            <?php if($is_valid_id): ?>
            <form class="form-update" action="treatment-update.php" method="post">
                <fieldset>
                    <label for="firstname">Prénom  </label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                </fieldset>
                <fieldset>
                    <label for="lastname">Nom  </label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                </fieldset>
                <fieldset>
                    <label for="telephone">Téléphone  </label>
                    <input type="tel" name="telephone" id="telephone" value="<?php echo $telephone; ?>">
                </fieldset>
                <fieldset>
                    <label for="address">Adresse  </label>
                    <input type="text" name="address" id="address" value="<?php echo $address; ?>">
                </fieldset>
                <input type="submit" name="submit" value="modifier">
            </form>
            <?php else: ?>
                <p class="feedback"><?php echo $feedback; ?></p>
            <?php endif; ?>    
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>