<?php 
session_start();
$title = "Connexion";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="connection">
        <h1>Connexion</h1>
        <div class="container">
            <?php if(isset($_SESSION['feedback-register']) && !empty($_SESSION['feedback-register'])): ?>    
            <p class="success">
            <?php echo $_SESSION['feedback-register']; ?>    
            </p>
            <?php endif;?>
            <form action="treatment-login.php" class="login-form" method="post">
                <fieldset>
                    <label for="email">Email  </label>
                    <input type="email" name="email" id="email">
                </fieldset>
                <fieldset>
                    <label for="password">Mot de passe  </label>
                    <input type="password" name="password" id="password">
                </fieldset>
                <input type="submit" name="submit" value="Me connecter">
            </form>
            <p class="register-link">Pas de compte ? <a href="register.php" title="inscrivez-vous">Inscrivez-vous</a></p>
            <?php if(isset($_SESSION['feedback-login']) && !empty($_SESSION['feedback-login'])): ?>    
            <p class="failed">
            <?php echo $_SESSION['feedback-login']; ?>    
            </p>
            <?php endif;?>
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>