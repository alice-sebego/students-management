<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Connexion</title>
</head>
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
            <p class="register">Pas de compte ? <a href="register.php" title="inscrivez-vous">Inscrivez-vous</a></p>
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