<?php
session_start();
$title = "Inscription"; 
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="register">
        <h1>Inscription</h1>
        <div class="container">
            <?php if(isset($_SESSION['feedback-register']) && !empty($_SESSION['feedback-register'])): ?>    
            <p class="failed">
            <?php echo $_SESSION['feedback-register']; ?>    
            </p>
            <?php endif;?>
            <form action="treatment-register.php" class="register-form" method="post">
                <fieldset>
                    <label for="firstname">Prénom  </label>
                    <input type="text" name="firstname" id="firstname" autocomplete="given-name">
                </fieldset>
                <fieldset>
                    <label for="lastname">Nom  </label>
                    <input type="text" name="lastname" id="lastname" autocomplete="family-name">
                </fieldset>
                <fieldset>
                    <label for="email">Email  </label>
                    <input type="email" name="email" id="email" autocomplete="email">
                </fieldset>
                <fieldset>
                    <label for="password">Mot de passe  </label>
                    <input type="password" name="password" id="password" autocomplete="new-password">
                </fieldset>
                <fieldset>
                    <label for="telephone">Téléphone  </label>
                    <input type="tel" name="telephone" id="telephone" autocomplete="tel">
                </fieldset>
                <fieldset>
                    <label for="address">Adresse  </label>
                    <input type="text" name="address" id="address" autocomplete="street-address">
                </fieldset>
                <fieldset>
                    <label for="picture">Photo de profil  </label>
                    <input type="file" name="picture" id="picture" class="file-input" accept="image/*">
                </fieldset>
                <input type="submit" name="submit" value="Je m'inscris">
            </form>
            <p class="login-link">Déjà un compte ? <a href="login.php" title="connectez-vous">Connectez-vous</a></p>
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>