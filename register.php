<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Inscription</title>
</head>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="register">
        <h1>Inscription</h1>
        <div class="container">
            <form action="inc/treatment-register.php" class="register-form" method="post">
                <fieldset>
                    <label for="firstname">Prénom  </label>
                    <input type="text" name="firstname" id="firstname">
                </fieldset>
                <fieldset>
                    <label for="lastname">Nom  </label>
                    <input type="text" name="lastname" id="lastname">
                </fieldset>
                <fieldset>
                    <label for="email">Email  </label>
                    <input type="email" name="email" id="email">
                </fieldset>
                <fieldset>
                    <label for="password">Mot de passe  </label>
                    <input type="password" name="password" id="password">
                </fieldset>
                <fieldset>
                    <label for="telephone">Téléphone  </label>
                    <input type="tel" name="telephone" id="telephone">
                </fieldset>
                <fieldset>
                    <label for="address">Adresse  </label>
                    <input type="text" name="address" id="address">
                </fieldset>
                <input type="submit" name="submit" value="Je m'inscris">
            </form>
            <p class="register">Déjà un compte ? <a href="login.php" title="connectez-vous">Connectez-vous</a></p>
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>