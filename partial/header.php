<header>
    <a href="index.php"><img src="https://cdn.svgporn.com/logos/nightwatch.svg" alt="logo nightwatch for example"></a>
    <?php if(isset($_SESSION['auth']['firstname']) && !empty($_SESSION['auth']['firstname'])): ?>    
    <p class="student-logged">
    <?php echo "Bienvenue <span>". $_SESSION['auth']['firstname'] . "</span>"; ?>    
    </p>
    <?php endif;?>
    <nav>
        <ul>
            <li class="nav login"><a href="login.php">Connexion</a></li>
            <?php if(isset($_SESSION['auth']['firstname'])): ?>
            <li class="nav logout"><a href="logout.php">Déconnexion</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>